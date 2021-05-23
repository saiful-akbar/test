<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>@yield('title') | Saiful Akbar Dashboard</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Saiful akbar admin dashboard for personal website" />
    <meta name="keywords" content="Saiful Akbar, saifulakbar13, Saiful_akbar13, ackbar_syaiful@yahoo.com, saifu-akbar, personal website">
    <meta name="author" content="Saiful Akbar" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Google fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    {{-- Icon fonts --}}
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/fonts/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/fonts/feather.css') }}">

    {{-- Core stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/css/bootstrap-material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/css/shreerang-material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/css/uikit.css') }}">

    {{-- Libs --}}
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/libs/perfect-scrollbar/perfect-scrollbar.css') }}">

    {{-- CSS pages --}}
    @yield('css')

</head>

<body>

    {{-- [ Preloader ] Start --}}
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    {{-- [ Preloader ] Ebd --}}



    {{-- [ layout guest] --}}
    @guest
        @yield('content')
    @endguest



    {{-- [ layout auth ] Start --}}
    @auth
        <div class="layout-wrapper layout-2">
            <div class="layout-inner">

                {{-- [ Layout sidenav (include) ]--}}
                @include('layouts.dashboard.sidenav')

                {{-- [ Layout container ] Start --}}
                <div class="layout-container">

                    {{-- [ Layout header ( include ) ]--}}
                    @include('layouts.dashboard.header')

                    {{-- [ Layout content ] Start --}}
                    <div class="layout-content">

                        {{-- [ content ] Start --}}
                        <div class="container-fluid flex-grow-1 container-p-y">

                            {{-- [ Page title ] --}}
                            <h4 class="font-weight-bold py-3 mb-0">@yield('title')</h4>

                            {{-- [ Breadcrumb ] --}}
                            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard.home') }}">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    </li>

                                    @yield('breadcrumb')
                                </ol>
                            </div>

                            {{-- [ Manin content] --}}
                            @yield('content')

                        </div>
                        {{-- [ content ] End --}}

                        {{-- [ Layout footer (include) ]--}}
                        @include('layouts.dashboard.footer')

                    </div>
                    {{-- [ Layout content ] Start --}}

                </div>
                {{-- [ Layout container ] End --}}

            </div>

            {{-- Overlay --}}
            <div class="layout-overlay layout-sidenav-toggle"></div>
        </div>
    @endauth
    {{-- [ layout auth ] End --}}




    {{-- Core scripts --}}
    <script src="{{ asset('assets/dashboard-layouts/js/pace.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/js/sidenav.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/js/layout-helpers.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/js/material-ripple.js') }}"></script>

    {{-- Libs --}}
    <script src="{{ asset('assets/dashboard-layouts/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/libs/bootbox/bootbox.js') }}"></script>

    {{-- Demo  --}}
    <script src="{{ asset('assets/dashboard-layouts/js/demo.js') }}"></script>
    <script src="{{ asset('assets/dashboard-layouts/js/analytics.js') }}"></script>

    {{-- Pages script --}}
    @yield('script')

    {{-- Main script --}}
    <script src="{{ asset('assets/dashboard-layouts/js/main.js') }}"></script>
</body>

</html>
