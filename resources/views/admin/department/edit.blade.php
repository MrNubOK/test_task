@extends('layouts.app')

@php /** @var \App\Models\Department $department */ @endphp

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Editing user #{{ $department->id }}</h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.messages.messages_block')

                        <form action="{{ route('users.update', $department->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name" name="name"
                                       placeholder="Enter Name"
                                       value="{{ old('name', $department->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control"
                                          id="description" name="description"
                                          rows="3">{{ $department->description }}</textarea>
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>

                            <h3>Users</h3>
                            @if($department->users->isEmpty())
                                Not employees yet
                            @endif
                            <ul style="list-style: none; padding: 0">
                            @foreach($department->users as $user)
                                <li><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></li>
                            @endforeach
                            </ul>

                            <button class="btn btn-dark">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
