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

        {{-- Home --}}
        <li class="sidenav-item {{ Request::is('app/home*') ? 'active' : null }}">
            <a href="{{ route('dashboard.home') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Home</div>
            </a>
        </li>

        {{-- Welcome page / Kit --}}
        <li class="sidenav-item">
            <a href="{{ route('main.home') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-grid"></i>
                <div>Welcome Page</div>
            </a>
        </li>

        {{-- Components --}}
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Components</li>

        {{-- account & profile --}}
        <li class="sidenav-item {{ Request::is('app/profile*') ? 'active' : null }}">
            <a href="{{ route('dashboard.profile') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-user"></i>
                <div>Account & Profile</div>
            </a>
        </li>

        {{-- resume --}}
        <li class="sidenav-item {{ Request::is('app/resume*') ? 'active open' : null }}">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-box"></i>
                <div>Resume</div>
            </a>
            <ul class="sidenav-menu">

                {{-- resume => Education --}}
                <li class="sidenav-item {{ Request::is('app/resume/education*') ? 'active' : null }}">
                    <a href="{{ route('dashboard.education') }}" class="sidenav-link">
                        <i class="sidenav-icon feather icon-book"></i>
                        <div>Education</div>
                    </a>
                </li>

                {{-- resume => work experience --}}
                <li class="sidenav-item {{ Request::is('app/resume/work-experience*') ? 'active' : null }}">
                    <a href="{{ route('dashboard.work-experience') }}" class="sidenav-link">
                        <i class="sidenav-icon feather icon-briefcase"></i>
                        <div>Work Experience</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Skill --}}
        <li class="sidenav-item {{ Request::is('app/skill*') ? 'active' : null }}">
            <a href="{{ route('dashboard.skill') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-codepen"></i>
                <div>Skill</div>
            </a>
        </li>
    </ul>
</div>
{{-- [ Layout sidenav ] End --}}
