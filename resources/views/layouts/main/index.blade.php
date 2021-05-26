<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <title>@yield('title')</title>
    <meta content="Personal website saiful akbar" name="description">
    <meta content="personal website, portofolio, saiful akbar, saifulakbar.com" name="keywords">

    {{-- Favicons --}}
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('assets/main-layouts/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('assets/main-layouts/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main-layouts/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/main-layouts/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">

    {{-- Template Main CSS File --}}
    <link href="{{ asset('assets/main-layouts/css/style.css') }}" rel="stylesheet">

    {{-- CSS Pages --}}
    @yield('main.css')
</head>

<body>

  {{-- Mobile nav toggle button --}}
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  {{-- Header --}}
  @include('layouts.main.sidenav')

  @section('main.content')
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>{{ $profile->profile_first_name }} {{ $profile->profile_last_name }}</h1>
            <p>
                <span class="typed" data-typed-items="Welcome to my personal website, I'm  Web Developer"></span>
            </p>
        </div>
    </section>
  @show

    {{-- Button back to top --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    {{-- Vendor JS Files --}}
    <script src="{{ asset('assets/main-layouts/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('assets/main-layouts/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <script src="{{ asset('assets/main-layouts/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    {{-- Template Main JS File --}}
    <script src="{{ asset('assets/main-layouts/js/main.js') }}"></script>

    {{-- Script pages --}}
    @yield('main.script')

</body>

</html>
