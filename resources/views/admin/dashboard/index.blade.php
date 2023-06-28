@extends('layouts.main-auth')

@section('section-auth')
<div class="row">

    <div class="col-lg-12">
      <div class="row">

        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Rukun Warga <span>| Master</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6><span id="countRukunWarga"></span></h6>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-xxl-3 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Photo <span>| Document</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-camera"></i>
                </div>
                <div class="ps-3">
                  <h6><span id="countPhoto"></span></h6>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-xxl-3 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Event <span>| Pengajuan</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-calendar-event"></i>
                </div>
                <div class="ps-3">
                  <h6><span id="countEvent"></span></h6>
                </div>
              </div>

            </div>
          </div>

        </div>

        <div class="col-xxl-3 col-xl-12">

          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Musbangkel <span>| Pengajuan</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-card-list"></i>
                </div>
                <div class="ps-3">
                  <h6><span id="countMusbangkel"></span></h6>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>
    </div>

</div>
@endsection