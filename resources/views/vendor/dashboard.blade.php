@extends('admin.layouts.master')
{{-- @section('title', 'Dashboard') --}}
@section('title', 'Feed Posts')

@section('css')
@endsection

@section('style')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mb-4">All Feeds</h2>
                @if ($feeds->isEmpty())
                    <p>No feeds available.</p>
                @else
                    @foreach ($feeds as $feed)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>{{ $feed->title }}</h3>
                            </div>

                            <div class="card-body">
                                {{-- Display the video --}}
                                @if ($feed->video)
                                    <div class="video-container mb-3">
                                        <video width="100%" controls>
                                            <source src="{{ $feed->video }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif

                                {{-- Display the description --}}
                                <p><strong>Description:</strong> {{ $feed->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- Pagination links --}}
                <div class="d-flex justify-content-center">
                    {{ $feeds->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
