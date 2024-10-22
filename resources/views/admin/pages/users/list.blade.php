@extends('admin.layouts.master')
@section('title', 'Users')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (session()->has('green'))
                <div class="alert alert-success">
                    <p>{{ session('green') }}</p>
                </div>
            @endif

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                        <h5>Users</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Add User</a>
                    </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if($user->role_id ==2)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role_id == 1 ? 'Admin' : 'Vendor' }}</td>
                                        <td>{{  $user->status == 1 ? 'Active' : 'Inactive'}}</td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
