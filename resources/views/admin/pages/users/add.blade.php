@extends('admin.layouts.master')
@section('title', 'Add User')

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
                        <h5>Add User</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="col-form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            {{-- <div class="mb-3">
                                <label class="col-form-label">Role</label>
                                <select class="form-control" name="role_id" required>
                                    <option value="1">Admin</option>
                                    <option value="2">Vendor</option>
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
