@extends('layouts.main-guest')

@section('section-guest')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @foreach ($videos as $video)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <div class="testimonial-item rounded p-4 p-lg-5 mb-5">
                        <div class="button-container d-flex align-items-center justify-content-center">
                            <button type="button" class="btn-play" data-bs-toggle="modal"
                                data-src="{{ asset('storage/' . $video->video) }}" data-bs-target="#videoModalEvent">
                                <span></span>
                            </button>
                        </div>
                        <p class="mb-4 mt-5">{{ $video->description }}</p>
                        <h5>{{ $video->name }} - {{ $video->request_event->event }}</h5>
                        <span class="text-primary">{{ $video->location }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal modal-video fade" id="videoModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Video</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="videoEvent" allowfullscreen
                        allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection