@extends('layouts.dashboard.index')

@section('title', 'Home')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4 overflow-hidden">
                <div class="card-body">
                    <div class="card-badges bg-danger text-white"><span>Urgent</span></div>
                    <a href="javascript:void(0)" class="text-dark text-large font-weight-semibold">Account Director</a>
                    <div class="d-flex flex-wrap mt-3">
                        <div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-business text-light" title="Department"></i> Marketing</div>
                        <div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-pin text-light" title="Location"></i> UK wide</div>
                        <div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-time text-primary" title="Employment"></i> Full-time</div>
                    </div>
                    <div class="my-3">
                        Donec dui risus, sagittis non congue vitae, auctor ornare ex. Aliquam hendrerit, odio vel dictum volutpat, nulla sapien venenatis tellus, vel aliquam enim eros vel ligula. Duis dictum, tellus et feugiat
                        viverra.
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary btn-round">Learn more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
