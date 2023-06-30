@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Event Request Form</h5>
            <form action="/event/{{ $request->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" required value="{{ old('name', $request->name) }}">
                      @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autocomplete="off" required value="{{ old('phone', $request->phone) }}">
                      @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="event" class="col-sm-2 col-form-label">Event Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('event') is-invalid @enderror" id="event" name="event" autocomplete="off" required value="{{ old('event', $request->event) }}">
                      @error('event') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="date_start" class="col-sm-2 col-form-label">Date Start</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="date_start" name="date_start" required value="{{ old('date_start', $request->date_start) }}">
                      @error('date_start') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="date_done" class="col-sm-2 col-form-label">Completion Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control @error('date_done') is-invalid @enderror" id="date_done" name="date_done" required value="{{ old('date_done', $request->date_done) }}">
                      @error('date_done') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="location" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('location') is-invalid @enderror" style="height: 100px" id="location" name="location">{{ old('location', $request->location) }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="proposal" class="col-sm-2 col-form-label">Proposal</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control @error('proposal') is-invalid @enderror" id="proposal" name="proposal">
                      @error('proposal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="surat_permohonan" class="col-sm-2 col-form-label">Surat Permohonan</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control @error('surat_permohonan') is-invalid @enderror" id="surat_permohonan" name="surat_permohonan">
                      @error('surat_permohonan') <div class="invalid-feedback">{{ $message }}</div> @enderror
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