@extends('admin.layouts.master')
@section('title', 'PDF Posts')

@section('css')
@endsection

@section('style')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mb-4">All PDF</h2>
                @if ($pdf->isEmpty())
                    <p>No pdf available.</p>
                @else
                    @foreach ($pdf as $data)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>{{ $data->title }}</h3>
                            </div>

                            <div class="card-body">
                                @if($data->pdf)
                                    <small>Current PDF: <a href="{{ $data->pdf }}" target="_blank">View PDF</a></small>
                                @endif

                                {{-- Display the description --}}
                                <p><strong>Description:</strong> {{ $data->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- Pagination links --}}
                <div class="d-flex justify-content-center">
                    {{ $pdf->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
