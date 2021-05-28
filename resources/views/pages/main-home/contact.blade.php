<div class="container">

    <div class="section-title">
        <h2>Contact</h2>
    </div>

    <div class="row" data-aos="fade-in">
        <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
                <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location:</h4>
                    <p>{{ $profile->profile_street }}, {{ $profile->profile_city }}, {{ $profile->profile_country }}</p>
                </div>

                <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>{{ $profile->profile_email }}</p>
                </div>

                <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>{{ $profile->profile_phone }}</p>
                </div>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.6996612263188!2d106.73956512367634!3d-6.3165120645426915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69efeebdf7204b%3A0x341a0b3e446fbca9!2sJl.%20Aria%20Putra%2C%20Kedaung%2C%20Kec.%20Pamulang%2C%20Kota%20Tangerang%20Selatan%2C%20Banten%2015415!5e0!3m2!1sid!2sid!4v1622022218702!5m2!1sid!2sid"
                    style="border:0; width: 100%; height: 290px;"
                    allowfullscreen="true"
                    loading="lazy"
                ></iframe>
            </div>
        </div>

        {{-- Form contact --}}
        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{ route('main.send.message') }}" method="post" class="php-email-form" id="form-message">
                @csrf @method('POST')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Your Name *</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            class="form-control"
                            required
                        />
                        <div class="invalid-feedback" data-error="email"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Your Email *</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            required

                        />
                        <div class="invalid-feedback" data-error="email"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input
                        type="text"
                        name="subject"
                        id="subject"
                        value="{{ old('subject') }}"
                        class="form-control"
                        required
                    />
                    <div class="invalid-feedback" data-error="subject"></div>
                </div>

                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea name="message" id="message" class="form-control" rows="10" required >{{ old('message') }}</textarea>
                    <div class="invalid-feedback" data-error="message"></div>
                </div>

                <div class="text-center">
                    <button type="submit" name="submit-message">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                        Send Message
                    </button>
                </div>

                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="alert-response-message" style="display: none;"></div>
            </form>
        </div>
        {{-- End form contact --}}

    </div>
</div>


@section('main.script')
    <script>
        $(document).ready(function () {
            $('#form-message').submit(function (e) {
                e.preventDefault();

                const form = $(this);
                const buttonSubmit = $('button[name=submit-message]');
                const spinner = buttonSubmit.children('span');
                const input = $('#form-message .form-control');
                const invalidFeedback = $('#form-message .invalid-feedback');
                const alert = $('#alert-response-message');

                input.removeClass('is-invalid');
                input.attr('readonly', true);
                invalidFeedback.hide();
                spinner.show();
                buttonSubmit.attr('disabled', true);

                $.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: form.serialize(),
                    dataType: "json",
                    success: function (res) {
                        input.attr('readonly', false);
                        buttonSubmit.attr('disabled', false);
                        spinner.hide();
                        alert.text(res.message);
                        alert.fadeIn();
                        form[0].reset();

                        setTimeout(() => {
                            alert.fadeOut();
                        }, 10000);
                    },
                    error: function(err) {
                        invalidFeedback.show();
                        input.attr('readonly', false);
                        buttonSubmit.attr('disabled', false);
                        spinner.hide();

                        const {errors} = err.responseJSON;

                        Object.keys(errors).find(key => {
                            $(`#${key}`).addClass('is-invalid');
                            $(`div[data-error=${key}]`).text(errors[key]);
                        });
                    }
                });
            });
        });
    </script>
@endsection
