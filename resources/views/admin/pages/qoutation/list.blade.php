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
                                    <th>Actions</th> <!-- Added for the View button -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qoutations as $qoutation)
                                    <tr>
                                        <td>{{ $qoutation->first_name ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->last_name ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->email ?? 'N/A' }}</td>
                                        <td>{{ $qoutation->contact_number ?? 'N/A' }}</td>
                                        <td>
                                            <!-- Trigger modal on button click -->
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal-{{ $qoutation->id }}">
                                                View
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Structure -->
                                    <div class="modal fade" id="viewModal-{{ $qoutation->id }}" tabindex="-1" aria-labelledby="viewModalLabel-{{ $qoutation->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel-{{ $qoutation->id }}">Quotation Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>First Name:</strong> {{ $qoutation->first_name ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Last Name:</strong> {{ $qoutation->last_name ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Email:</strong> {{ $qoutation->email ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Contact Number:</strong> {{ $qoutation->contact_number ?? 'N/A' }}</p>
                                                            </div>
                                                            {{-- <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Date of Birth:</strong> {{ $qoutation->date_of_birth ?? 'N/A' }}</p>
                                                            </div> --}}
                                                            {{-- <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Gender:</strong> {{ $qoutation->gender ?? 'N/A' }}</p>
                                                            </div> --}}
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Occupation:</strong> {{ $qoutation->occupation ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Work Address:</strong> {{ $qoutation->work_address ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Work Email:</strong> {{ $qoutation->work_email ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Insurance Type:</strong> {{ $qoutation->insurance_type ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Coverage Amount:</strong> {{ $qoutation->coverage_amount ?? 'N/A' }}</p>
                                                            </div>
                                                            {{-- <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Premium Payment:</strong> {{ $qoutation->premium_payment ?? 'N/A' }}</p>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Include Bootstrap JS -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

                </div>
            </div>
        </div>
    </div>
@endsection
