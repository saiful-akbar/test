{{-- Header --}}
<header id="header" class="alt">
    <a href="{{ route('landing.index') }}" class="logo">
        <strong>{{ $profile->profile_first_name }}</strong> <span>{{ $profile->profile_last_name }}</span>
    </a>
    <nav>
        <a href="#menu">Menu</a>
    </nav>
</header>
{{-- End Header --}}
