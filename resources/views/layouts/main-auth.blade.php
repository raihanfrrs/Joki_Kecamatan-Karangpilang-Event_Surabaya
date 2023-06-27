<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kecamatan Karangpilang</title>

  <!-- ========== VENDOR CSS ========= -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/bootstrap-5.2.2-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ asset('/') }}vendor/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="{{ asset('/') }}vendor/lineicons/lineicons.css" />
  <link rel="stylesheet" href="{{ asset('/') }}vendor/materialdesignicons/materialdesignicons.min.css" />
  <link rel="stylesheet" href="{{ asset('/') }}vendor/datatables/css/datatables.min.css" />
  <link rel="stylesheet" href="{{ asset('/') }}vendor/sweetalert2/sweetalert2.min.css"/>

  <!-- ========== VENDOR JS ========= -->
  <script src="{{ asset('/') }}vendor/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>

  <!-- ========== MAIN CSS ========= -->
  <link rel="stylesheet" href="{{ asset('/') }}css/main.css" />
</head>

<body>
    @guest
        @if (request()->is('login') || request()->is('register'))
        <main>
            <div class="container">
        
              <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                @yield('authorization')
              </section>
              
            </div>
        </main>
        @endif
    @endguest

    @auth
        @include('partials.auth.header')

        @include('partials.auth.sidebar')

        @include('partials.flasher')

        <main id="main" class="main">
            @include('partials.auth.breadcrumb-title')
            
            <section class="section {{ request()->is('/') ? 'dashboard' : '' }}">
                @yield('section-auth')
            </section>
        </main>
    @endauth


    <!-- Vendor JS Files -->
    <script src="{{ asset('/') }}vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('/') }}vendor/jquery/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('/') }}vendor/datatables/js/datatables.min.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}vendor/chart.js/chart.umd.js"></script>
    <script src="{{ asset('/') }}vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('/') }}vendor/quill/quill.min.js"></script>
    <script src="{{ asset('/') }}vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('/') }}vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('/') }}vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/') }}js/datatables.min.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>
</body>
</html>