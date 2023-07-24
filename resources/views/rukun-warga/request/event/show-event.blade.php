@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                <h5 class="card-title">Detail Event Request</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Event</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">{{ $event->event }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Phone</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">{{ $event->phone }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Start Date</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">{{ $event->date_start }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Completion Date</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">{{ $event->date_done }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Status</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            @if ($event->status == 'terima')
                                <span class="badge rounded-pill bg-primary">Accept</span>
                            @elseif ($event->status == 'selesai')
                                <span class="badge rounded-pill bg-success">Done</span>
                            @elseif ($event->status == 'proses')
                                <span class="badge rounded-pill bg-warning">Process</span>
                            @elseif ($event->status == 'tolak')
                                <span class="badge rounded-pill bg-warning">Reject</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Location</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">{{ $event->location }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Event Requested</div>
                        <div class="col-lg-9 col-md-8">{{ \Carbon\Carbon::parse($event->created_at)->format('d/m/Y') }}</div>
                    </div>

                    @if ($event->admin_id)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Handled By</div>
                        <div class="col-lg-9 col-md-8">{{ $event->admin->name }}</div>
                    </div>
                    @endif

                    @if ($event->feedback)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Feedback</div>
                            <div class="col-lg-9 col-md-8">{{ $event->feedback }}</div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>

    @if ($event->photo || $event->video )
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                    <h5 class="card-title">Event Documentation</h5>

                    @if ($event->photo)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Photo</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            <img src="{{ asset('storage/' . $event->photo) }}" class="img-preview img-fluid" />
                        </div>
                    </div>
                    @endif

                    @if ($event->video)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Video</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            <video controls class="video-preview w-100">
                                <source src="{{ asset('storage/'. $event->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
    @endif

    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                    <h5 class="card-title">Event Document</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Proposal</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            <iframe src="{{ asset('storage/' . $event->proposal) }}" width="400" height="300" class="w-100"></iframe>
                        </div>
                        <div class="col-lg-3 col-md-4 label">Status</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            @if ($event->status_proposal == 'terima')
                                <span class="badge rounded-pill bg-primary">Accept</span>
                            @elseif ($event->status_proposal == 'proses')
                                <span class="badge rounded-pill bg-warning">Process</span>
                            @elseif ($event->status_proposal == 'tolak')
                                <span class="badge rounded-pill bg-warning">Reject</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Surat Permohonan</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            <iframe src="{{ asset('storage/' . $event->surat_permohonan) }}" width="400" height="300" class="w-100"></iframe>
                        </div>
                        <div class="col-lg-3 col-md-4 label">Status</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            @if ($event->status_permohonan == 'terima')
                                <span class="badge rounded-pill bg-primary">Accept</span>
                            @elseif ($event->status_permohonan == 'proses')
                                <span class="badge rounded-pill bg-warning">Process</span>
                            @elseif ($event->status_permohonan == 'tolak')
                                <span class="badge rounded-pill bg-warning">Reject</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection