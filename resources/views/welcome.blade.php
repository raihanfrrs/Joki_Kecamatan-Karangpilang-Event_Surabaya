{{-- @auth

@endauth --}}

@extends('layouts.main-auth')

@section('section')
    @if (auth()->user()->level == 'admin')
        @include('admin.dashboard.index')
    @elseif (auth()->user()->level == 'user')
        @include('rukun-warga.dashboard.index')
    @endif
@endsection

{{-- @guest
@extends('layouts.main-guest')

@section('section')
    @include('warga.dashboard.index')
@endsection
@endguest --}}