{{-- Contact --}}
<section id="contact">
    <div class="inner">
        <section>

            {{-- Alert jika pesan error --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Alert jika pesan berhasil --}}
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form message --}}
                <form method="post" action="{{ route('landing.send.message') }}">
                    @csrf
                    @method('POST')

                    <div class="fields">
                        <div class="field half">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required/>
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required/>
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="6" required maxlength="200">
                                {{ old('message') }}
                            </textarea>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Send Message" class="primary" /></li>
                        <li><input type="reset" value="Clear" /></li>
                    </ul>
                </form>
            {{-- End form message --}}

        </section>

        <section class="split">
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-envelope"></span>
                    <h3>Email</h3>
                    <a href="mailto:{{ $profile->profile_email }}?subject=www.saifulakbar.com">{{ $profile->profile_email }}</a>
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-phone"></span>
                    <h3>Phone</h3>
                    <span>{{ $profile->profile_phone }}</span>
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-home"></span>
                    <h3>Address</h3>
                    <span>
                        {{ $profile->profile_street }}.<br />
                        {{ $profile->profile_city }}.<br />
                        {{ $profile->profile_country }}.
                    </span>
                </div>
            </section>
        </section>
    </div>
</section>
{{-- End Contact --}}
