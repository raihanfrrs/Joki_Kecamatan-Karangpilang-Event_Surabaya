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
                        <div class="col-lg-3 col-md-4 label">Handled By Admin</div>
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
                            <iframe src="{{ asset('storage/'. $event->proposal) }}" class="w-100" style="height: 15vw;" frameborder="5"></iframe>
                            <form action="/event/{{ $event->slug }}/proposal" method="post">
                                @method('put')
                                @csrf
                                <div class="mt-2 text-center">
                                    @if ($event->status_proposal == 'proses')
                                        <button class="btn btn-md btn-success me-2" name="status" value="terima">Accept</button>
                                        <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                                    @elseif ($event->status_proposal == 'terima')
                                        <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                                    @elseif ($event->status_proposal == 'tolak')
                                        <button class="btn btn-md btn-success" name="status" value="terima">Accept</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Surat Permohonan</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            <iframe src="{{ asset('storage/'. $event->surat_permohonan) }}" class="w-100" style="height: 15vw;" frameborder="5"></iframe>
                            <form action="/event/{{ $event->slug }}/permohonan" method="post">
                                @method('put')
                                @csrf
                                <div class="mt-2 text-center">
                                    @if ($event->status_permohonan == 'proses')
                                        <button class="btn btn-md btn-success me-2" name="status" value="terima">Accept</button>
                                        <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                                    @elseif ($event->status_permohonan == 'terima')
                                        <button class="btn btn-md btn-danger" name="status" value="tolak">Reject</button>
                                    @elseif ($event->status_permohonan == 'tolak')
                                        <button class="btn btn-md btn-success" name="status" value="terima">Accept</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                    <h5 class="card-title">Event Feedback</h5>

                    <form action="/event/{{ $event->slug }}/feedback" method="post">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Feedback</div>
                            <div class="col-lg-9 col-md-8 text-capitalize">
                                <textarea class="form-control @error('feedback') is-invalid @enderror" style="height: 100px" name="feedback" required>{{ old('feedback', $event->feedback) }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection