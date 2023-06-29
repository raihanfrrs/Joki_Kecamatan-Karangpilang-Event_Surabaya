@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Photo Form</h5>
            <form action="/photo/{{ $photo->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" required value="{{ old('name', $photo->name) }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="photo" class="col-sm-2 col-form-label">Photo Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" onchange="previewImage()">
                    @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    @if ($photo->photo)
                      <img src="{{ asset('storage/'. $photo->photo) }}" class="img-preview img-fluid mt-3 col-sm-5" />
                    @else
                      <img src="" class="img-preview img-fluid mt-3 col-sm-5" />
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" autocomplete="off" required value="{{ old('location', $photo->location) }}">
                      @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                  </div>

                <div class="row mb-3">
                  <label for="description" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 100px" id="description" name="description">{{ old('description', $photo->location) }}</textarea>
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