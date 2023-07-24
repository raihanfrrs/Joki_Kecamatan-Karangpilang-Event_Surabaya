@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                <h5 class="card-title">Detail Musbangkel Request</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Name</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">{{ $request->name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Request Type</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">{{ $request->request_type }}</div>
                    </div>

                    @if ($request->size)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Size</div>
                            <div class="col-lg-9 col-md-8 text-capitalize">{{ $request->size }}</div>
                        </div>
                    @elseif ($request->amount)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Amount</div>
                            <div class="col-lg-9 col-md-8 text-capitalize">{{ $request->amount }}</div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Status</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            @if ($request->status == 'terima')
                                <span class="badge rounded-pill bg-primary">Accept</span>
                            @elseif ($request->status == 'selesai')
                                <span class="badge rounded-pill bg-success">Done</span>
                            @elseif ($request->status == 'proses')
                                <span class="badge rounded-pill bg-warning">Process</span>
                            @elseif ($request->status == 'tolak')
                                <span class="badge rounded-pill bg-warning">Reject</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Location</div>
                        <div class="col-lg-9 col-md-8">{{ $request->location }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Musbangkel Requested</div>
                        <div class="col-lg-9 col-md-8">{{ \Carbon\Carbon::parse($request->created_at)->format('d/m/Y') }}</div>
                    </div>

                    @if ($request->admin_id)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Handled By</div>
                        <div class="col-lg-9 col-md-8">{{ $request->admin->name }}</div>
                    </div>
                    @endif

                    @if ($request->feedback)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Feedback</div>
                            <div class="col-lg-9 col-md-8">{{ $request->feedback }}</div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>

    @if ($request->photo || $request->video )
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                    <h5 class="card-title">Musbangkel Documentation</h5>

                    @if ($request->photo)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Photo</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            <img src="{{ asset('storage/' . $request->photo) }}" class="img-preview img-fluid" />
                        </div>
                    </div>
                    @endif

                    @if ($request->video)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Video</div>
                        <div class="col-lg-9 col-md-8 text-capitalize">
                            <video controls class="video-preview w-100">
                                <source src="{{ asset('storage/'. $request->video) }}" type="video/mp4">
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
</div>
@endsection