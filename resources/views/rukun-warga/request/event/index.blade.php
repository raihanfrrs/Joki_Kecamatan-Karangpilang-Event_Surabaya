@extends('layouts.main-auth')

@section('section-auth')
    <div class="row align-items-top">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><a href="/request/event/add" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i> Event</a></h5>
                <div class="table-wrapper table-responsive mt-3">
                    <table id="dataRequestEvent" class="table">
                        <thead>
                            <th>ID</th>
                            <th>Event</th>
                            <th>Phone</th>
                            <th>Start Date</th>
                            <th>Completion Date</th>
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