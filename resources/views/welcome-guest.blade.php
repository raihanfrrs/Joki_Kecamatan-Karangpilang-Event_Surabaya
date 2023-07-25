@guest

@extends('layouts.main-guest')

@section('section-guest')
    @include('partials.guest.feature')

    @include('partials.guest.about')

    @include('warga.dashboard.index-photo')

    @include('warga.dashboard.index-video')
@endsection

@endguest