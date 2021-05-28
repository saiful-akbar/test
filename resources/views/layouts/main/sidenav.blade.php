@php
use App\Models\Sosmed;

$sosmeds = Sosmed::all();

@endphp

<header id="header">
    <div class="d-flex flex-column">

        {{-- Profile --}}
        <div class="profile">
            <img src="{{ asset('storage/'.$profile->profile_avatar) }}" alt="Avatar" class="img-fluid rounded-circle">

            <h1 class="text-light">
                <a href="{{ route('main.home') }}">
                    {{ $profile->profile_first_name }} {{ $profile->profile_last_name }}
                </a>
            </h1>

            <div class="social-links mt-3 text-center">
                @foreach ($sosmeds as $sosmed)
                    <a href="{{ $sosmed->sosmed_url }}" target="_blank">
                        <i class="{{ $sosmed->sosmed_icon }}"></i>
                    </a>
                @endforeach
            </div>
        </div>
        {{-- End profile --}}

        {{-- Nav menu --}}
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li>
                    <a href="#hero" class="scrollto active">
                        <i class="bx bx-home"></i> <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#about" class="scrollto">
                        <i class="bx bx-user"></i> <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="#resume" class="scrollto">
                        <i class="bx bx-file-blank"></i> <span>Resume</span>
                    </a>
                </li>
                <li>
                    <a href="#portfolio" class="scrollto">
                        <i class="bx bx-book-content"></i> <span>Portfolio</span>
                    </a>
                </li>
                <li>
                    <a href="#contact" class="scrollto">
                        <i class="bx bx-envelope"></i> <span>Contact</span>
                    </a>
                </li>

                @guest
                    <li>
                        <a href="{{ route('login') }}" target="_blank">
                            <i class="bx bx-log-in-circle"></i> <span>Log In</span>
                        </a>
                    </li>
                @endguest

                @auth
                    <li>
                        <a href="{{ route('dashboard.home') }}" target="_blank">
                            <i class="bx bxs-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void()" onclick="document.getElementById('form-logout').submit();">
                            <i class="bx bx-log-out-circle"></i> <span>Log Out</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
        {{-- End nav menu --}}

    </div>

    {{-- Form logout --}}
    <form action="{{ route('logout') }}" method="POST" id="form-logout">
        @csrf
        @method('POST')
    </form>
</header>
