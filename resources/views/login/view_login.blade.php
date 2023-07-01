@extends('layouts.main-auth')

@section('authorization')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="{{ asset('/') }}img/logo.png">
            <span class="d-none d-lg-block">Kelurahan Karangpilang</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>

            <form action="/login" method="POST" class="row g-3 needs-validation">
            @csrf
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" autocomplete="off" required value="{{ old('username') }}">
                <div class="invalid-feedback"></div>
              </div>

              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('username') is-invalid @enderror" id="password" required>
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection