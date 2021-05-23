<footer id="footer">
    <div class="inner">
        <ul class="icons">
            @foreach ($sosmeds as $sosmed)
                <li>
                    <a href="{{ $sosmed->sosmed_url }}" target="_blank" class="icon brands alt {{ $sosmed->sosmed_icon }}" >
                        <span class="label">{{ ucwords($sosmed->sosmed_name) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

        <ul class="copyright">
            <li>&copy; Saiful Akbar</li>
            <li><a href="{{ route('landing.index') }}">www.saifulakbar.com</a></li>
        </ul>
    </div>
</footer>
