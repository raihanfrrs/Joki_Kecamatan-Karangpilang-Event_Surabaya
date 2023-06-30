@extends('layouts.main-guest')

@section('section-guest')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-4">Ajukan Event Disini!</h1>
                <p>Website yang membantu untuk masyarakat umum dalam lingkup kelurahan Karangpilang mengajukan event.</p>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="mb-4">Pengajuan Form</h2>
                <form action="/pengajuan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" required autocomplete="off" value="{{ old('name') }}">
                            <label for="name">Your Name</label>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('event') is-invalid @enderror" id="event" name="event" placeholder="Event Name" required autocomplete="off" value="{{ old('event') }}">
                            <label for="event">Event Name</label>
                            @error('event') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="date_start" name="date_start" required value="{{ old('date_start') }}">
                            <label for="date_start">Start Date</label>
                            @error('date_start') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="date" class="form-control @error('date_done') is-invalid @enderror" id="date_done" name="date_done" required value="{{ old('date_done') }}">
                            <label for="date_done">Completion Date</label>
                            @error('date_done') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Your Phone" required autocomplete="off" value="{{ old('phone') }}">
                            <label for="phone">Your Phone</label>
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-floating">
                            <textarea class="form-control @error('location') is-invalid @enderror" placeholder="Location" id="location"
                                style="height: 130px" name="location" required></textarea>
                            <label for="location">Location</label>
                            @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="file" class="form-control @error('proposal') is-invalid @enderror" id="proposal" name="proposal" placeholder="Proposal" required  value="{{ old('proposal') }}">
                            <label for="proposal">Proposal</label>
                            @error('proposal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="file" class="form-control @error('surat_permohonan') is-invalid @enderror" id="surat_permohonan" name="surat_permohonan" placeholder="Surat Permohonan" required value="{{ old('surat_permohonan') }}">
                            <label for="surat_permohonan">Surat Permohonan</label>
                            @error('surat_permohonan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-primary w-100 py-3" type="submit">Submit Now</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection