<!-- resources/views/admin/pages/feeds/edit.blade.php -->

@extends('admin.layouts.master')
@section('title', 'Edit Feed')

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
                        <h5>Edit Feed</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('feeds.update', $feed->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="col-form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $feed->title }}" placeholder="Optional">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ $feed->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $feed->status == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ $feed->description }}</textarea>
                            </div>

                            {{-- <div class="mb-3">
                                <label class="col-form-label">Extra</label>
                                <textarea class="form-control" name="extra" rows="2">{{ $feed->extra }}</textarea>
                            </div> --}}

                            <div class="mb-3">
                                <label class="col-form-label">Video</label>
                                <input type="file" class="form-control" name="video" accept="video/*">
                                @if($feed->video)
                                    <small>Current Video: <a href="{{ $feed->video }}" target="_blank">View Video</a></small>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update Feed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
