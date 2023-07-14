@extends('layouts.main-auth')

@section('section-auth')
    <div class="row align-items-top">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="table-wrapper table-responsive mt-3">
                    <table id="dataMusbangkel" class="table">
                        <thead>
                            <th>ID</th>
                            <th>Rukun Warga</th>
                            <th>Name</th>
                            <th>Request Type</th>
                            <th>Size</th>
                            <th>Amount</th>
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