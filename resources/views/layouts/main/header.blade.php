@php
use App\Models\Socmed;

$socmeds = Socmed::where('socmed_publish', 1)->orderBy('socmed_name', 'asc')->get();
@endphp


<header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="logo me-auto me-lg-0">
            <a href="{{ route('main.home') }}">Saiful</a>
        </h1>

        {{-- Navbar --}}
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li>
                    <a class="{{ Request::is('/') ? 'active' : null }}" href="{{ route('main.home') }}">Home</a>
                </li>
                <li>
                    <a class="{{ Request::is('about*') ? 'active' : null }}" href="{{ route('main.about') }}">About</a>
                </li>
                <li>
                    <a class="{{ Request::is('resume*') ? 'active' : null }}" href="{{ route('main.resume') }}">Resume</a>
                </li>
                <li>
                    <a class="{{ Request::is('services*') ? 'active' : null }}" href="#">Services</a>
                </li>
                <li>
                    <a class="{{ Request::is('portofolio*') ? 'active' : null }}" href="#">Portfolio</a>
                </li>
                <li>
                    <a class="{{ Request::is('contact*') ? 'active' : null }}" href="{{ route('main.contact') }}">Contact</a>
                </li>

                @auth
                    <li>
                        <a href="{{ route('dashboard.home') }}" target="_blank">Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:void()" onclick="document.getElementById('form-logout').submit();">Logout</a>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" target="_blank">Login</a>
                    </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        {{-- Social media --}}
        <div class="header-social-links">
            @foreach ($socmeds as $socmed)
                <a href="{{ $socmed->socmed_url }}" target="_blank"><i class="{{ $socmed->socmed_icon }}"></i></a>
            @endforeach
        </div>

    </div>

    {{-- Form logout --}}
    <form action="{{ route('logout') }}" method="POST" id="form-logout" style="display: none;">
        @csrf @method('POST')
    </form>
</header>
