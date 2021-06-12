@extends('layouts.main.index')

@section('title', 'Home')

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <h1>{{ $profile->profile_first_name }} {{ $profile->profile_last_name }}</h1>
            <h2>I'm a web developer</h2>
            <a href="#" class="btn-download">Download CV</a>
        </div>
    </section>
@endsection
