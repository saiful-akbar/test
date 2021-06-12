@extends('layouts.main.index')

@section('title', 'contact')

@section('content')
    <main id="main">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.6996612263188!2d106.73956512367634!3d-6.3165120645426915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69efeebdf7204b%3A0x341a0b3e446fbca9!2sJl.%20Aria%20Putra%2C%20Kedaung%2C%20Kec.%20Pamulang%2C%20Kota%20Tangerang%20Selatan%2C%20Banten%2015415!5e0!3m2!1sid!2sid!4v1622022218702!5m2!1sid!2sid"
                        style="border:0; width: 100%; height: 290px;"
                        allowfullscreen="true"
                        loading="lazy"
                    ></iframe>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-4">
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
                        </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <div id="response-message"></div>

                        <div class="row">
                            <div class="col-lg-12">
                                <form
                                    id="form-message"
                                    action="{{ route('main.send.message') }}"
                                    method="post"
                                    role="form"
                                    class="php-email-form"
                                >
                                    @csrf @method('POST')

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                id="name"
                                                placeholder="Your Name"
                                                required
                                            />
                                            <small class="invalid-feedback" data-error="name"></small>
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <input
                                                type="email"
                                                class="form-control"
                                                name="email"
                                                id="email"
                                                placeholder="Your Email"
                                                required
                                            />
                                            <small class="invalid-feedback" data-error="email"></small>
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="subject"
                                            id="subject"
                                            placeholder="Subject"
                                            required
                                        />
                                        <small class="invalid-feedback" data-error="subject"></small>
                                    </div>

                                    <div class="form-group mt-3">
                                        <textarea
                                            id="message"
                                            class="form-control"
                                            name="message"
                                            rows="6"
                                            placeholder="Message"
                                            required
                                        ></textarea>
                                        <small class="invalid-feedback" data-error="message"></small>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit">
                                            <span
                                                class="spinner-border spinner-border-sm mr-2"
                                                style="display: none"
                                                role="status"
                                                aria-hidden="true"
                                            ></span>
                                            Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            /**
             * Handle submiting form message
             */
            $("#form-message").submit(function (e) {
                e.preventDefault();

                // Ambil element
                const form = $(this);
                const input = $("#form-message :input");
                const spinner = $("#form-message .spinner-border");
                const button = $("#form-message button[type=submit]");
                const responseMessage = $("#response-message");

                input.attr("readonly", true);
                button.attr("disabled", true);
                spinner.show();

                console.log(input.val());

                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: form.serialize(),
                    dataType: "json",
                    success: function (res) {
                        input.attr("readonly", false);
                        input.removeClass("is-invalid");
                        button.attr("disabled", false);
                        spinner.hide();
                        form[0].reset();
                        responseMessage.html(`
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success.</strong> ${res.message}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        `);
                    },
                    error: function (err) {
                        input.attr("readonly", false);
                        button.attr("disabled", false);
                        spinner.hide();

                        const { errors } = err.responseJSON;
                        for (const key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                $(`#${key}`).addClass("is-invalid");
                                $(`small[data-error=${key}]`).text(errors[key]);
                            }
                        }
                    },
                });
            });
        });
    </script>
@endsection
