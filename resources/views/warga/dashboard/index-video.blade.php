@if ($videos->count() > 0)
<div class="container-xxl pt-5">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">VIDEO KITA</p>
            <h1 class="display-5 mb-5">Event Hebat yang Telah Kami Selesaikan</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($videos as $video)
            <div class="testimonial-item rounded p-4 p-lg-5 mb-5">
                <img class="mb-4" src="img/testimonial-1.jpg" alt="">
                <p class="mb-4">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et
                    sit, sed stet lorem sit clita duo justo</p>
                <h5>Client Name</h5>
                <span class="text-primary">Profession</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif