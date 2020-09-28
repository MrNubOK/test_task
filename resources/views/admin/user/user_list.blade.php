@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    User List
                </div>
                <div>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Registration</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @php /** @var \App\User $user */ @endphp
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card text-center mt-3">
                <div class="card-body paginator_block">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
