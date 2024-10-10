@extends('admin.layouts.master')
@section('title', 'Edit Profile')

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
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-thumbs-up">
                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                    </svg>
                    <p>{{ session('green') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                        title=""></button>
                </div>
            @endif

            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('profile/edit_post') }}" class="theme-form mega-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">First Name</label>
                                                <input class="form-control" id="first_name" name="first_name" required value="{{ $profile->first_name }}"
                                                    type="text" placeholder="Enter First Name">
                                            </div>
                                        </div>

                                        <!-- Last Name -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Last Name</label>
                                                <input class="form-control" id="last_name" name="last_name" required value="{{ $profile->last_name }}"
                                                    type="text" placeholder="Enter Last Name">
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Email</label>
                                                <input class="form-control" id="email" name="email" required value="{{ $profile->email }}"
                                                    type="email" placeholder="Enter Email">
                                            </div>
                                        </div>

                                        <!-- Profile Image -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Profile Image</label>
                                                <input class="form-control" id="image" name="image" type="file" accept="image/*">
                                                @if($profile->image)
                                                    <img src="{{ asset('storage/' . $profile->image) }}" alt="Profile Image" class="mt-2" width="100">
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Password</label>
                                                <input class="form-control" id="password" name="password"
                                                    type="password" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Confirm Password</label>
                                                <input class="form-control" id="confirm_password" name="confirm_password"
                                                    type="password" placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="{{ request()->route('id') }}">
                                    </div>

                                    <input type="submit" class="btn btn-primary text-end mt-2" style="float: right" value="Edit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
