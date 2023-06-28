@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Rukun Warga Form</h5>
            <form action="/rw" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" required value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autocomplete="off" required value="{{ old('phone') }}">
                      @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="off" required value="{{ old('email') }}">
                      @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autocomplete="off" required value="{{ old('username') }}">
                      @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                      @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
            
            </form>
            </div>
        </div>

    </div>
</div>
@endsection