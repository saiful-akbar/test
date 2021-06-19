@extends('layouts.dashboard.index')

@section('title', 'Login')

@push('css.libs')
    <link rel="stylesheet" href="{{ asset('/assets/dashboard-layouts/css/pages/authentication.css') }}">
@endpush

@section('content')
    <div class="authentication-wrapper authentication-3">
        <div class="authentication-inner">

            {{-- [ Side container ] Start --}}
            <div
                class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5"
                style="background-image: url('{{ asset("/assets/images/bg/bg-login.jpg") }}');"
            >
                <div class="ui-bg-overlay bg-dark opacity-50"></div>

                {{-- [ Text ] Start --}}
                <div class="w-100 text-white px-5">
                    <h1 class="display-2 font-weight-bolder mb-4">LOG IN</h1>
                    <div class="text-large font-weight-light">
                        Please login boss to proceed to the dashboard page
                    </div>
                </div>
                {{-- [ Text ] End --}}

            </div>
            {{-- [ Side container ] End --}}

            {{-- [ Form container ] Start --}}
            <div class="d-flex col-lg-4 align-items-center bg-white p-5">

                {{-- Inner container --}}
                {{-- Have to add `.d-flex` to control width via `.col-*` classes --}}
                <div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">
                    <div class="w-100">

                        {{-- [ Logo ] Start --}}
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="ui-w-60">
                                <div class="w-100 position-relative">
                                    <img src="{{ asset('/assets/images/logo/logo-circle.png') }}" alt="Brand Logo" class="img-fluid">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        {{-- [ Logo ] End --}}

                        <h4 class="text-center text-lighter font-weight-normal mt-3 mb-0">Log in to Your Account</h4>

                        {{-- [ Form ] Start --}}
                        <form class="my-5" method="POST" action="{{ route("login.user") }}">
                            @csrf
                            @method('POST')

                            <div class="form-group position-relative @error('username') mb-5 @enderror">
                                <label class="form-label">Username</label>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    placeholder="Enter your username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}"
                                />

                                @error('username')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group position-relative @error('password') mb-5 @enderror">
                                <label class="form-label">Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Enter your password"
                                    class="form-control @error('password') is-invalid @enderror"
                                />

                                @error('password')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round btn-block mb-3">Sign In</button>
                                </div>
                                <div class="col-sm-12">
                                    <a href="{{ route('main.home') }}" class="btn btn-outline-secondary btn-round btn-block">Return to the main page</a>
                                </div>
                            </div>
                        </form>
                        {{-- [ Form ] End --}}

                    </div>
                </div>
            </div>
            {{-- [ Form container ] End --}}

        </div>
    </div>
@endsection
