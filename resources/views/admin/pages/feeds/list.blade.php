<!-- resources/views/admin/pages/feeds/list.blade.php -->

@extends('admin.layouts.master')
@section('title', 'Feed List')

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
                        <h5>Feed List</h5>
                        <a href="{{ route('feeds.create') }}" class="btn btn-primary float-right">Add Feed</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Video</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feeds as $feed)
                                    <tr>
                                        <td>{{ $feed->title ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($feed->status) }}</td>
                                        <td>
                                            @if($feed->video)
                                                <a href="{{ $feed->video }}" target="_blank">View Video</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('feeds.edit', $feed->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('feeds.destroy', $feed->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
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
