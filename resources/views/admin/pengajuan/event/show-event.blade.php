@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                <h5 class="card-title">Detail Event Request</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{ $request->name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ $request->phone }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Event Name</div>
                    <div class="col-lg-9 col-md-8">{{ $request->event }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date Start</div>
                    <div class="col-lg-9 col-md-8">{{ $request->date_start }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date Done</div>
                    <div class="col-lg-9 col-md-8">{{ $request->date_done }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8 text-capitalize">
                        @if ($request->status == 'terima')
                            <span class="badge rounded-pill bg-primary">Terima</span>
                        @elseif ($request->status == 'selesai')
                            <span class="badge rounded-pill bg-success">Selesai</span>
                        @elseif ($request->status == 'proses')
                            <span class="badge rounded-pill bg-warning">Proses</span>
                        @elseif ($request->status == 'tolak')
                            <span class="badge rounded-pill bg-warning">Tolak</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Location</div>
                    <div class="col-lg-9 col-md-8">{{ $request->location }}</div>
                </div>

                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Document</h5>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Proposal</div>
                <iframe src="{{ asset('storage/'. $request->proposal) }}" class="w-100" style="height: 15vw;" frameborder="5"></iframe>
                <form action="/event/{{ $request->slug }}/proposal" method="post">
                    @method('put')
                    @csrf
                    <div class="mt-2 text-center">
                        @if ($request->status_proposal == 'proses')
                            <button class="btn btn-md btn-success me-2" name="status" value="terima">Accept</button>
                            <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                        @elseif ($request->status_proposal == 'terima')
                            <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                        @elseif ($request->status_proposal == 'tolak')
                            <button class="btn btn-md btn-success" name="status" value="terima">Accept</button>
                        @endif
                    </div>
                </form>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Surat Permohonan</div>
                <iframe src="{{ asset('storage/'. $request->surat_permohonan) }}" class="w-100" style="height: 15vw;" frameborder="5"></iframe>
                <form action="/event/{{ $request->slug }}/permohonan" method="post">
                    @method('put')
                    @csrf
                    <div class="mt-2 text-center">
                        @if ($request->status_permohonan == 'proses')
                            <button class="btn btn-md btn-success me-2" name="status" value="terima">Accept</button>
                            <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                        @elseif ($request->status_permohonan == 'terima')
                            <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                        @elseif ($request->status_permohonan == 'tolak')
                            <button class="btn btn-md btn-success" name="status" value="terima">Accept</button>
                        @endif
                    </div>
                </form>
            </div>

            </div>
        </div>

    </div>
</div>
@endsection