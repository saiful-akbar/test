@extends('layouts.main.index')

@section('title', 'Resume')

@section('content')
    <main id="main">
        <section id="resume" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Resume</h2>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <h3 class="resume-title">Education</h3>

                        @foreach ($educations as $education)
                            <div class="resume-item">
                                <h4>{{ $education->education_level }}</h4>
                                <h5>{{ $education->education_from }} - {{ $education->education_to }}</h5>
                                <p><em>{{ $education->education_school }}</em></p>
                                <p>{{ $education->education_desc }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-6">
                        <h3 class="resume-title">Professional Experience</h3>

                        @foreach ($work_experiences as $work_experience)
                            <div class="resume-item">
                                <h4>{{ $work_experience->we_field_of_work }}</h4>
                                <h5>{{ $work_experience->we_from }} - {{ $work_experience->we_to }}</h5>
                                <p><em>{{ $work_experience->we_field_of_company }}</em></p>
                                <p>{{ $work_experience->we_desc }}</p>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
