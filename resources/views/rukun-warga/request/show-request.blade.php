@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <div class="profile-overview" id="profile-overview">
                <h5 class="card-title">Detail Musbangkel Request</h5>

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

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Musbangkel Created</div>
                    <div class="col-lg-9 col-md-8">{{ \Carbon\Carbon::parse($request->created_at)->format('d/m/Y') }}</div>
                </div>

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
</div>
@endsection