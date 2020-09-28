@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Department List
                    </div>
                    <div>
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Description</th>
                                <th scope="col">Employees</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                @php /** @var \App\Models\Department $department */ @endphp
                                <tr>
                                    <td style="width: 20%">
                                        <img class="photo" src="/images/default/user.jpg">
                                    </th>
                                    <td style="width: 45%">
                                        <h5>
                                            <a href="{{ route('departments.edit', $department->id) }}">
                                                {{ $department->name }}
                                            </a>
                                        </h5>
                                        {{ $department->description }}
                                    </td>
                                    <td>
                                        @if($department->users->isEmpty())
                                            Not employees yet
                                        @endif
                                        <ul style="list-style: none; padding: 0">
                                            @foreach($department->users as $user)
                                            <li class="">
                                                <a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        {{ $department->email }}
                                    </td>
                                    <td><a class="btn btn-primary" href="{{ route('departments.edit', $department->id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card text-center mt-3">
                    <div class="card-body paginator_block">
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
