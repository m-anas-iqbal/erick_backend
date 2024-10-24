@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-xl-12 box-col-12 xl-100">
                <div class="row dash-chart">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card p-4 rounded shadow py-5">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <h5 class="m-0"> Total Videos</h5>
                                    <h1 class="m-0 fs-5rem text-primary">{{ $feedsCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 rounded shadow py-5">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <h5 class="m-0">Total PDF</h5>
                                    <h1 class="m-0 fs-5rem text-primary">{{ $pdfCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 rounded shadow py-5">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <h5 class="m-0">Total Users</h5>
                                    <h1 class="m-0 fs-5rem text-primary">{{ $userCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 rounded shadow py-5">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <h5 class="m-0">Total Contact us form Submitted</h5>
                                    <h1 class="m-0 fs-5rem text-primary">{{ $contactCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 rounded shadow py-5">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <h5 class="m-0">Total Qoutation form Submitted</h5>
                                    <h1 class="m-0 fs-5rem text-primary">{{ $qoutationCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 rounded shadow py-5">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <h5 class="m-0">Total Partner form Submitted</h5>
                                    <h1 class="m-0 fs-5rem text-primary">{{ $partnerCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-4 rounded shadow py-5">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <h5 class="m-0">Total Newsletter form Submitted</h5>
                                    <h1 class="m-0 fs-5rem text-primary">{{ $newsletterCount }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
