@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Video Form</h5>
            <form action="/video" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" required value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="video" class="col-sm-2 col-form-label">Video Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control @error('video') is-invalid @enderror" type="file" id="video" name="video" required>
                    @error('video') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" autocomplete="off" required value="{{ old('location') }}">
                      @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>

                <div class="row mb-3">
                  <label for="description" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 100px" id="description" name="description">{{ old('description') }}</textarea>
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