@extends('layouts.dashboard.index')

@section('title', 'Home')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="row row-bordered mx-0">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                        <a href="{{ route('dashboard.profile') }}" class="text-dark my-2">
                            <div class="card-body text-center py-4">
                                <div class="feather icon-user display-4 text-primary"></div>
                                <h5 class="m-0 mt-3">Account & Profile</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                        <a href="{{ route('dashboard.education') }}" class="text-dark my-2">
                            <div class="card-body text-center py-4">
                                <div class="feather icon-book display-4 text-primary"></div>
                                <h5 class="m-0 mt-3">Education</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                        <a href="{{ route('dashboard.work-experience') }}" class="text-dark my-2">
                            <div class="card-body text-center py-4">
                                <div class="feather icon-briefcase display-4 text-primary"></div>
                                <h5 class="m-0 mt-3">Work Experience</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-sm-4 col-md-3 col-lg-4">
                        <a href="{{ route('dashboard.skill') }}" class="text-dark my-2">
                            <div class="card-body text-center py-4">
                                <div class="feather icon-codepen display-4 text-primary"></div>
                                <h5 class="m-0 mt-3">Skill</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
