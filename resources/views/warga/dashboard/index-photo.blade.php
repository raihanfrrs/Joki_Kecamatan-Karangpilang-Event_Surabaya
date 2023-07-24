@if ($photos->count() > 0)
<div class="container-xxl pt-5">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">FOTO KAMI</p>
            <h1 class="display-5 mb-5">Event Hebat yang Telah Kami Selesaikan</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($photos as $photo)
                <div class="project-item mb-5">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/project-1.jpg" alt="">
                        <div class="project-overlay">
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href="img/project-1.jpg"
                                data-lightbox="project"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i
                                    class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <a class="d-block h5" href="">Data Analytics & Insights</a>
                        <span>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif