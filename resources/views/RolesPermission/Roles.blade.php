@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('rolesandpermission.index') }}">Roles and Permissions</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('role.index') }}">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('permission.index') }}">Permissions</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="card">
                    <div class="card-header">Create a New Role</div>

                    <div class="card-body">
                        <!-- Form to create a new role -->
                        <form action="{{ route('role.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Insert role</label>
                                <input type="text" class="form-control" name="role" id="role" aria-describedby="helpId"
                                    placeholder="Enter The Roles">
                            </div>
                            <div class="form-group">
                                <label for="permissions">Permissions</label>
                                <select class="form-control" name="permissions[]" id="permissions" multiple>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Create Role</button>
                        </form>
                    </div>
                </div>

                <!-- List existing roles -->
                <div class="card mt-4">
                    <div class="card-header">Existing Roles</div>

                    <div class="card-body">
                        <ul>
                            @foreach ($roles as $role)
                                <li>{{ $role->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
