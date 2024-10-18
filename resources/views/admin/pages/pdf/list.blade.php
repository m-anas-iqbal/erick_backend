<!-- resources/views/admin/pages/pdf/list.blade.php -->

@extends('admin.layouts.master')
@section('title', 'PDF List')

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
                        <div class="d-flex justify-content-between">
                            <h5>PDF List</h5>
                            <a href="{{ route('pdf.create') }}" class="btn btn-primary float-right">Add PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th class="text-center">PDF</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pdf as $data)
                                    <tr>
                                        <td>{{ $data->title ?? 'N/A' }}</td>
                                        <td>{{  $data->status == 1 ? 'Active' : 'Inactive'}}</td>
                                        <td class="text-center">
                                            @if($data->pdf)
                                                <a href="{{ $data->pdf }}" target="_blank">View PDF</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('pdf.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('pdf.destroy', $data->id) }}" method="POST" style="display:inline;">
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
