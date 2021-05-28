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
                                <div class="lnr lnr-users display-4 text-primary"></div>
                                <h5 class="m-0 mt-3">Account & Profile</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
