@php
    function birthday(){
        $birthdate = new DateTime("1996-04-13");
        $today = new DateTime("today");
        return $today->diff($birthdate)->y;
    }
@endphp


<div class="container">
    <div class="section-title">
        <h2>About</h2>
    </div>

    <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
            <img src="{{ asset('storage/'.$profile->profile_avatar) }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Web Developer.</h3>
            <p class="fst-italic">
                Professional web application developer from Jakarta, Indonesia. I always give my best for every project I do. I provide solutions with my creative applications.
            </p>

            <div class="row">
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $profile->profile_date_of_birth }} {{ $profile->profile_month_of_birth }} {{ $profile->profile_year_of_birth }}</span>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>{{ $profile->profile_website }}</span>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $profile->profile_phone }}</span>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $profile->profile_city }}, {{ $profile->profile_country }}</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ birthday() }}</span>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $profile->profile_email }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
