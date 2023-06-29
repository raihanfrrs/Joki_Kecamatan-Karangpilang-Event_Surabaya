<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kelurahan Karangpilang</title>

  <!-- ========== VENDOR CSS ========= -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/bootstrap-5.2.2-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ asset('/') }}vendor/bootstrap-icons/bootstrap-icons.css" />
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
            
            <section class="section {{ request()->is('/') ? 'dashboard' : (request()->is('profile') ? 'profile' : '') }}">
                @yield('section-auth')
            </section>
        </main>
    @endauth


    <!-- Vendor JS Files -->
    <script src="{{ asset('/') }}vendor/jquery/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('/') }}vendor/datatables/js/datatables.min.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}vendor/simple-datatables/simple-datatables.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/') }}js/datatables.min.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>
    <script src="{{ asset('/') }}js/pre-image.js"></script>
    <script src="{{ asset('/') }}js/pre-video.js"></script>
    <script src="{{ asset('/') }}js/button-custom.js"></script>
    @auth
      @if (auth()->user()->level == 'admin')
        <script src="{{ asset('/') }}js/admin.js"></script>
      @else
        <script src="{{ asset('/') }}js/rukun-warga.js"></script>
      @endif
    @endauth
</body>
</html>