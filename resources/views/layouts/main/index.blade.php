<!DOCTYPE HTML>
<html>
	<head>
        <title>@yield("title") | Saiful Akbar</title>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="theme-color" content="#000000" />
        <meta name="description" content="My persoal website" />
        <meta name="author" content="Saiful Akbar" />
        <meta name="keywords" content="Saiful Akbar, saiful, akbar, saiful-akbar, saiful-akbar13, saifulakbar13, ackbar_syaiful@yahoo.com, personal website" />

        {{-- Konfigurasi PWA di iOS --}}
        <meta name="apple-mobile-web-app-title" content="Saiful Akbar" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="apple-mobile-web-app-capable" content="yes" />

        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" />
        <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/svg+xml" id="icon" />

        {{-- Bootstrap CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"/>

        {{-- Main CSS --}}
        <link rel="stylesheet" href="{{ asset('assets/main-layouts/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('assets/main-layouts/css/noscript.css') }}" /></noscript>
    </head>

	<body class="is-preload">

		{{-- Wrapper --}}
        <div id="wrapper">

            {{-- Top bar --}}
            @include("layouts.main.header")

            {{-- Menu --}}
            @include("layouts.main.menu")

            {{-- Banner --}}
            @yield("banner")

            {{-- Main Content--}}
            <div id="main">
                @yield("content")
            </div>

            {{-- Contact --}}
            @include("layouts.main.contact")


            {{-- Footer --}}
            @include("layouts.main.footer")

        </div>


        {{-- Bootstrap Bundle with Popper --}}
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"
        ></script>

        {{-- Main Scripts --}}
        <script src="{{ asset('assets/main-layouts/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/main-layouts/js/jquery.scrolly.min.js') }}"></script>
        <script src="{{ asset('assets/main-layouts/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ asset('assets/main-layouts/js/browser.min.js') }}"></script>
        <script src="{{ asset('assets/main-layouts/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('assets/main-layouts/js/util.js') }}"></script>
        <script src="{{ asset('assets/main-layouts/js/main.js') }}"></script>

        {{-- Pages Script --}}
        @yield("script")

	</body>
</html>
