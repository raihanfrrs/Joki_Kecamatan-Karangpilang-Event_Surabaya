@extends('layouts.main-auth')

@section('section-auth')
    <div class="row align-items-top">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><a href="/video/add" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i> Video</a></h5>
                <div class="table-wrapper table-responsive">
                    <table id="dataVideo" class="table">
                        <thead>
                            <th>ID</th>
                            <th>Video</th>
                            <th>Name</th>
                            <th>Event</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Uploaded At</th>
                            <th>Action</th>
                        </thead>
                    </table>
                </div>
              </div>
            </div>
  
          </div>
    </div>
@endsection