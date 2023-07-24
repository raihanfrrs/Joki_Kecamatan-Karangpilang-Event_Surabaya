@extends('layouts.main-auth')

@section('section-auth')
<form action="/request/musbangkel" method="POST" enctype="multipart/form-data">
@csrf

  <div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Musbangkel Request Form <sup class="text-danger">*Required</sup></h5>

                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" required value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Request Type</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="request_type">
                        <option value="fisik" {{ old('request_type') == 'fisik' ? 'selected' : '' }}>Fisik</option>
                        <option value="barang" {{ old('request_type') == 'barang' ? 'selected' : '' }}>Barang</option>
                      </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="size" class="col-sm-2 col-form-label">Size</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" autocomplete="off" required value="{{ old('size') }}">
                      @error('size') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" autocomplete="off" required value="{{ old('amount') }}">
                    @error('amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="location" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('location') is-invalid @enderror" style="height: 100px" id="location" name="location">{{ old('location') }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6">
      
      <div class="card">
        <div class="card-body">
        <h5 class="card-title">Musbangkel Request Documentation <sup class="text-danger">*Optional</sup></h5>

            <div class="row mb-3">
              <label for="photo" class="col-sm-2 col-form-label">Photo</label>
              <div class="col-sm-10">
                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" onchange="previewImage()">
                @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <div class="col-12">
                  <img src="" class="img-preview img-fluid mt-3 col-sm-5" />
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="video" class="col-sm-2 col-form-label">Video</label>
              <div class="col-sm-10">
                  <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video" onchange="previewVideo()">
                  @error('video') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  <video class="video-preview mt-3 w-50" controls></video>
              </div>
            </div>

        </div>
      </div>

    </div>
  </div>

</form>
@endsection