@extends('layouts.main-auth')

@section('section-auth')
<form action="/request/event" method="POST" enctype="multipart/form-data" class="d-inline">
    @csrf
    <div class="row align-items-top">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Event Request Form <sup class="text-danger">*Required</sup></h5>
                    <div class="row mb-3">
                    <label for="event" class="col-sm-3 col-form-label">Event</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('event') is-invalid @enderror" id="event" name="event" autocomplete="off" required value="{{ old('event') }}">
                            @error('event') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autocomplete="off" required value="{{ old('phone') }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date_start" class="col-sm-3 col-form-label">Start Date</label>
                        <div class="col-sm-9">
                        <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="date_start" name="date_start" required value="{{ old('date_start') }}">
                        @error('date_start') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date_done" class="col-sm-3 col-form-label">Completion Date</label>
                        <div class="col-sm-9">
                        <input type="date" class="form-control @error('date_done') is-invalid @enderror" id="date_done" name="date_done" required value="{{ old('date_done') }}">
                        @error('date_done') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="location" class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('location') is-invalid @enderror" style="height: 100px" id="location" name="location">{{ old('location') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Event Request Documentation <sup class="text-danger">*Optional</sup></h5>
                    
                    <div class="row mb-3">
                        <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" onchange="previewImage()">
                            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class="col-12">
                                <img src="" class="img-preview img-fluid mt-3 col-sm-5" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="video" class="col-sm-3 col-form-label">Video</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video" onchange="previewVideo()">
                            @error('video') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <video class="video-preview mt-3 w-50" controls></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Event Request Document <sup class="text-danger">*Required</sup></h5>
                    
                    <div class="row mb-3">
                        <label for="proposal" class="col-sm-3 col-form-label">Proposal</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('proposal') is-invalid @enderror" id="iframe" name="proposal" required onchange="previewIframe()">
                            @error('proposal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class="col-12">
                                <iframe id="previewFrame" width="400" height="300" class="mt-3"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="surat_permohonan" class="col-sm-3 col-form-label">Surat Permohonan</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('surat_permohonan') is-invalid @enderror" id="second_iframe" name="surat_permohonan" required onchange="previewSecondIframe()">
                            @error('surat_permohonan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class="col-12">
                                <iframe id="second_previewFrame" width="400" height="300" class="mt-3"></iframe>
                            </div>
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
    </div>
</form>
@endsection