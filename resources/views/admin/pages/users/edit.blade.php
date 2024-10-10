@extends('admin.layouts.master')
@section('title', 'Edit User')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('green'))
                <div class="alert alert-success">
                    <p>{{ session('green') }}</p>
                </div>
            @endif

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit User</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="col-form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                                <small>Leave blank if you don't want to change it</small>
                            </div>

                            {{-- <div class="mb-3">
                                <label class="col-form-label">Role</label>
                                <select class="form-control" name="role_id" required>
                                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Vendor</option>
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                                <small>Current Image: <img src="{{ $user->image }}" alt="User Image" width="100"></small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
