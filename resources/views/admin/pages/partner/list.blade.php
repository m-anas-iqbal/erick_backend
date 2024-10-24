@extends('admin.layouts.master')
@section('title', 'Partner List')

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
                        <h5>Partner List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>Agency Company Name</th>
                                    <th>Actions</th> <!-- Added for the View button -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->first_name ?? 'N/A' }}</td>
                                        <td>{{ $partner->last_name ?? 'N/A' }}</td>
                                        <td>{{ $partner->contact_number ?? 'N/A' }}</td>
                                        <td>{{ $partner->agency_company_name ?? 'N/A' }}</td>
                                        <td>
                                            <!-- Trigger modal on button click -->
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal-{{ $partner->id }}">
                                                View
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Structure -->
                                    <div class="modal fade" id="viewModal-{{ $partner->id }}" tabindex="-1" aria-labelledby="viewModalLabel-{{ $partner->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel-{{ $partner->id }}">Partner Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>First Name:</strong> {{ $partner->first_name ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Last Name:</strong> {{ $partner->last_name ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Contact Number:</strong> {{ $partner->contact_number ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Email:</strong> {{ $partner->social_security_number ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Lines of Authority:</strong> {{ $partner->lines_of_authority ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Years of Experience:</strong> {{ $partner->years_of_experience ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Previous Employers:</strong> {{ $partner->previous_employers ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Position Title:</strong> {{ $partner->position_title ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6 py-2 border-bottom">
                                                                <p><strong>Employment Status:</strong> {{ $partner->employment_status ?? 'N/A' }}</p>
                                                            </div>
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
