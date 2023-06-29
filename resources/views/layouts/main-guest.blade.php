<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kelurahan Karangpilang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('/') }}img/logo.png" rel="icon">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}vendor/bootstrap-icons/bootstrap-icons.css" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/') }}vendor/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}vendor/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/') }}vendor/bootstrap/css/bootstrap-custom.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet">
</head>

<body>
    
    @include('partials.guest.spinner')

    @include('partials.guest.header')

    @include('partials.guest.carousel')

    @yield('section-guest')

    @include('partials.guest.footer')

    <!-- JavaScript Libraries -->
    <script src="{{ asset('/') }}vendor/jquery/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}vendor/wow/wow.min.js"></script>
    <script src="{{ asset('/') }}vendor/easing/easing.min.js"></script>
    <script src="{{ asset('/') }}vendor/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('/') }}vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}vendor/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/') }}js/main-guest.js"></script>
</body>

</html>