@extends('layouts.main-auth')

@section('section-auth')
    <div class="row align-items-top">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="table-wrapper table-responsive mt-3">
                    <table id="dataEvent" class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Event</th>
                            <th>Start Date</th>
                            <th>Completion Date</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                    </table>
                </div>
              </div>
            </div>
  
          </div>
    </div>
@endsection