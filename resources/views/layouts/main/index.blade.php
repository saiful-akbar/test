<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') - Saiful Akbar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- Favicons --}}
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('assets/main-layouts/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/fontawesome/css/all.css') }}" rel="stylesheet">

    {{-- Template Main CSS File --}}
    <link href="{{ asset('assets/main-layouts/css/style.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>

    {{-- Header --}}
    @include('layouts.main.header')

    {{-- Hero Section --}}
    @yield('content')

    {{-- Footer --}}
    @include('layouts.main.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    {{-- JQuery --}}
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"
    ></script>

    {{-- Vendor JS Files --}}
    <script src="{{ asset('assets/main-layouts/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/waypoints/noframework.waypoints.js') }}"></script>

    {{-- Template Main JS File --}}
    <script src="{{ asset('assets/main-layouts/js/main.js') }}"></script>

    @yield('script')

</body>

</html>
