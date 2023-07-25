@extends('layouts.main-guest')

@section('section-guest')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @foreach ($photos as $photo)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="project-item mb-5">
                    <div class="position-relative">
                    <img class="img-fluid" src="{{ asset('storage/'. $photo->photo) }}" alt="">
                        <div class="project-overlay">
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href="{{ asset('storage/'. $photo->photo) }}"
                                data-lightbox="project"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i
                                    class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <a class="d-block h5" href="">{{ $photo->name }} - {{ $photo->request_event->event }}</a>
                        <span>{{ $photo->description }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection