@auth

@extends('layouts.main-auth')

@section('section-auth')
    @if (auth()->user()->level == 'admin')
        @include('admin.dashboard.index')
    @elseif (auth()->user()->level == 'rukun warga')
        @include('rukun-warga.dashboard.index')
    @endif
@endsection

@endauth