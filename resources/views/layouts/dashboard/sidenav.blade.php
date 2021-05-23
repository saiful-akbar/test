{{-- [ Layout sidenav ] Start --}}
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

    {{-- Brand demo (see assets/css/demo/demo.css) --}}
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/images/logo/logo-circle.png') }}" alt="Brand Logo" class="img-fluid" width="40">
        </span>
        <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Dashboard</a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>

    {{-- Links --}}
    <ul class="sidenav-inner py-1">

        {{-- Welcome page / Kit --}}
        <li class="sidenav-item">
            <a href="{{ route('landing.index') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-grid"></i>
                <div>Welcome Page</div>
            </a>
        </li>

        {{-- Home --}}
        <li class="sidenav-item {{ Request::is('app/home*') ? 'active' : null }}">
            <a href="{{ route('dashboard.home.index') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Home</div>
            </a>
        </li>

        {{-- Layouts --}}
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">UI Components</li>

        <li class="sidenav-item">
            <a href="typography.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-type"></i>
                <div>Typography</div>
            </a>
        </li>
    </ul>
</div>
{{-- [ Layout sidenav ] End --}}
