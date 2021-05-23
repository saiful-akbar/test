{{-- Menu --}}
<nav id="menu">
    <ul class="links">
        <li><a href="{{ route('landing.index') }}">Home</a></li>

        {{-- Loop menu --}}
        @foreach ($menus as $menu)
            <li><a href="{{ url($menu->article_url) }}">{{ $menu->article_title }}</a></li>
        @endforeach
        {{-- End loop menu --}}

    </ul>
    <ul class="actions stacked">
        @auth
            <li><a href="{{ route('dashboard.home.index') }}" class="button primary fit">Dashboard</a></li>
        @endauth

        @auth
            <li>
                <a
                    href="javascript:"
                    class="button fit"
                    onclick="document.getElementById('logout').submit()" class="button fit"
                >
                    Log Out
                </a>
            </li>

            <form action="{{ route('logout') }}" method="POST" id="logout">
                @csrf
                @method('POST')
            </form>
        @endauth

        @guest
            <li><a href="{{ route('login') }}" class="button fit">Log In</a></li>
        @endguest
    </ul>
</nav>
{{-- End Menu --}}
