@extends('admin.layouts.master')
@section('title', 'Edit PDF')

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
                        <h5>Edit PDF</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pdf.update', $pdf->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="col-form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $pdf->title }}" placeholder="Optional">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ $pdf->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $pdf->status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ $pdf->description }}</textarea>
                            </div>

                            {{-- <div class="mb-3">
                                <label class="col-form-label">Extra</label>
                                <textarea class="form-control" name="extra" rows="2">{{ $pdf->extra }}</textarea>
                            </div> --}}

                            <div class="mb-3">
                                <label class="col-form-label">PDF</label>
                                <input type="file" class="form-control"  name="pdf" accept="application/pdf">
                                @if($pdf->pdf)
                                    <small>Current PDF: <a href="{{ $pdf->pdf }}" target="_blank">View PDF</a></small>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
