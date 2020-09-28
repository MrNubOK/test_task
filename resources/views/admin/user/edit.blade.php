@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Editing user #{{ $user->id }}</h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.messages.messages_block')

                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name" name="name"
                                       placeholder="Enter Name"
                                       value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email"
                                       class="form-control"
                                       id="email" name="email"
                                       placeholder="Enter Email"
                                       value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Set New Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="password" name="password"
                                       placeholder="Enter new Password"
                                       value="{{ old('password') }}">
                            </div>
                            <button class="btn btn-dark">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
