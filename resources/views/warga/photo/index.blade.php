@extends('layouts.main-guest')

@section('section-guest')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Photos</h1>
        </div>
        <div class="row g-4">
            @foreach ($photos as $photo)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="{{ asset('storage/'. $photo->photo) }}" alt="">
                    <h5>{{ $photo->name }}</h5>
                    <span class="text-primary">{{ $photo->location }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection