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
            <li><a href="#" class="button primary fit">Dashboard</a></li>
        @endauth

        @auth
            <li><a href="#" class="button fit">Log Out</a></li>
        @endauth

        @guest
            <li><a href="#" class="button fit">Log In</a></li>
        @endguest
    </ul>
</nav>
{{-- End Menu --}}
