@extends('admin.layouts.master')
@section('title', 'Contact Forms List')

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
                        <h5>Contact Forms List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Service</th>
                                    <th>Message</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactus as $contact)
                                    <tr>
                                        <td>{{ $contact->first_name ?? 'N/A' }}</td>
                                        <td>{{ $contact->last_name ?? 'N/A' }}</td>
                                        <td>{{ $contact->email ?? 'N/A' }}</td>
                                        <td>{{ $contact->phone ?? 'N/A' }}</td>
                                        <td>{{ $contact->subject ?? 'N/A' }}</td>
                                        <td>{{ $contact->service ?? 'N/A' }}</td>
                                        <td>{{ $contact->decription ?? 'N/A' }}</td>
                                        {{-- <td>
                                            <a href="{{ route('contactus.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('contactus.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
