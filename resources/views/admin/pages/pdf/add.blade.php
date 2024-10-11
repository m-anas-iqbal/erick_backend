@extends('admin.layouts.master')
@section('title', 'Add PDF')

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
                        <h5>Add PDF</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="col-form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Optional">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Optional"></textarea>
                            </div>

                            {{-- <div class="mb-3">
                                <label class="col-form-label">Extra</label>
                                <textarea class="form-control" name="extra" rows="2" placeholder="Optional"></textarea>
                            </div> --}}

                            <div class="mb-3">
                                <label class="col-form-label">PDF</label>
                                <input type="file" class="form-control"  name="pdf" accept="application/pdf" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
