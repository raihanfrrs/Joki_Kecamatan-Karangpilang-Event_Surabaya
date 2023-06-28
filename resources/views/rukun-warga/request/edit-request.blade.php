@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Musbangkel Request Form</h5>
            <form action="/request/{{ $request->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Request Type</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="request_type">
                        <option>Type</option>
                        <option value="fisik" {{ $request->request_type == 'fisik' ? 'selected' : '' }}>Fisik</option>
                        <option value="barang" {{ $request->request_type == 'barang' ? 'selected' : '' }}>Barang</option>
                      </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="location" class="col-sm-2 col-form-label">Size</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" autocomplete="off" required value="{{ old('size', $request->size) }}">
                      @error('size') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" autocomplete="off" required value="{{ old('amount', $request->amount) }}">
                    @error('amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="location" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('location') is-invalid @enderror" style="height: 100px" id="location" name="location">{{ old('location', $request->location) }}</textarea>
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