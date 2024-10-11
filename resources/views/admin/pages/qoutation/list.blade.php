@extends('admin.layouts.master')
@section('title', 'Quotation List')

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
                        <h5>Quotation List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Occupation</th>
                                    <th>Work Address</th>
                                    <th>Work Email</th>
                                    <th>Insurance Type</th>
                                    <th>Coverage Amount</th>
                                    <th>Premium Payment</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qoutations as $qoutation)
                                    <tr>
                                        <td>{{ $qoutation->first_name ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->last_name ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->email ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->contact_number ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->date_of_birth ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->gender ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->occupation ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->work_address ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->work_email ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->insurance_type ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->coverage_amount ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->premium_payment ?? 'N/A' }}</td>
                                        {{-- <td>
                                            <a href="{{ route('qoutation.show', $qoutation->id) }}" class="btn btn-info">View</a>
                                            <form action="{{ route('qoutation.destroy', $qoutation->id) }}" method="POST" style="display:inline;">
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
