@extends('layouts.main-auth')

@section('section-auth')
<div class="row align-items-top">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title"><a href="/request/musbangkel/add" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i> Musbangkel</a></h5>
            <div class="table-wrapper table-responsive">
                <table id="dataRequestMusbangkel" class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Request Type</th>
                        <th>Size</th>
                        <th>Amount</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Requested At</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
            </div>
        </div>

    </div>
</div>
@endsection