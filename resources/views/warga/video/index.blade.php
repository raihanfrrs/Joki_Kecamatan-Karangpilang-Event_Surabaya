@extends('layouts.main-guest')

@section('section-guest')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Videos</h1>
        </div>
        <div class="row g-4">
            @foreach ($videos as $video)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <video controls class="w-75">
                        <source src="{{ asset('storage/'. $video->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h5>{{ $video->name }}</h5>
                    <span class="text-primary">{{ $video->location }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection