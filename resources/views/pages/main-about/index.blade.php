@extends('layouts.main.index')

@section('title', 'About')

@section('content')

    @php
        function birthday(){
            $birthdate = new DateTime("1996-04-13");
            $today = new DateTime("today");
            return $today->diff($birthdate)->y;
        }
    @endphp


    <main id="main">

    {{-- About Section --}}
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About</h2>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('storage/'.$profile->profile_avatar) }}" class="img-thumbnail" alt="Avatar">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3>Web Developer</h3>

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Birthday</th>
                                        <td>:</td>
                                        <td>{{ $profile->profile_date_of_birth }} {{ $profile->profile_month_of_birth }} {{ $profile->profile_year_of_birth }}</td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <td>:</td>
                                        <td>{{ birthday() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Degree</th>
                                        <td>:</td>
                                        <td>Bachelor</td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td>:</td>
                                        <td>{{ $profile->profile_website }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>:</td>
                                        <td>{{ $profile->profile_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td>{{ $profile->profile_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>:</td>
                                        <td>{{ $profile->profile_city }}, {{ $profile->profile_country }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- End About Section --}}

    {{-- Skills Section --}}
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">
            <div class="section-title"><h2>Skills</h2></div>

            <div class="row skills-content">
                <div class="col-lg-6">
                    @foreach ($skills as $skill)
                        @if ($loop->iteration <= ceil($skill->count() / 2))
                            <div class="progress">
                                <span class="skill">{{ $skill->skill_name }}</span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-lg-6">
                    @foreach ($skills as $skill)
                        @if ($loop->iteration > ceil($skill->count() / 2))
                            <div class="progress">
                                <span class="skill">{{ $skill->skill_name }}</span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- End Skills Section --}}

  </main>
@endsection
