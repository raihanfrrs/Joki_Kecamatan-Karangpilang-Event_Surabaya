@if ($videos->count() > 0)
<div class="container-xxl pt-5">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">OUR VIDEO</p>
            <h1 class="display-5 mb-5">Event Hebat yang Telah Kami Selesaikan</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($videos as $video)
            <div class="testimonial-item rounded p-4 p-lg-5 mb-5">
                <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="{{ asset('storage/' . $video->video) }}" data-bs-target="#videoModalEvent">
                            <span></span>
                </button>
                <p class="mb-4 mt-5">{{ $video->description }}</p>
                <h5>{{ $video->name }} - {{ $video->request_event->event }}</h5>
                <span class="text-primary">{{ $video->location }}</span>
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
@endif