@php

use App\Models\User;

$user = User::find(Auth::user()->id)->profile()->first();

@endphp

{{-- [ Layout navbar ( Header ) ] Start --}}
<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

    {{-- Brand demo (see assets/css/demo/demo.css) --}}
    <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/images/logo/logo-circle.png') }}" alt="Brand Logo" class="img-fluid" width="35">
        </span>
        <span class="app-brand-text demo font-weight-normal ml-2">Bhumlu</span>
    </a>

    {{-- Sidenav toggle (see assets/css/demo/demo.css) --}}
    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
            <i class="ion ion-md-menu text-large align-middle"></i>
        </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="layout-navbar-collapse">

        {{-- Divider --}}
        <hr class="d-lg-none w-100 my-2">

        {{-- Search --}}
        <div class="navbar-nav align-items-lg-center">
            <label class="nav-item navbar-text navbar-search-box p-0 active">
                <i class="feather icon-search navbar-icon align-middle"></i>
                <span class="navbar-search-input pl-2">
                    <input type="text" class="form-control navbar-text mx-2" placeholder="Search...">
                </span>
            </label>
        </div>

        <div class="navbar-nav align-items-lg-center ml-auto">

            {{-- [ Notifikasi message ] --}}
            @include('layouts.dashboard.notification')

            {{-- Divider --}}
            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>

            <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                        <img src="{{ asset('storage/'.$user->profile_avatar) }}" alt class="d-block ui-w-30 rounded-circle">
                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{ $user->profile_first_name }} {{ $user->profile_last_name }}</span>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:" class="dropdown-item">
                        <i class="feather icon-user text-muted"></i>&nbsp; My profile
                    </a>
                    <a href="{{ route('dashboard.message') }}" class="dropdown-item">
                        <i class="feather icon-mail text-muted"></i>&nbsp; Messages
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:" class="dropdown-item" onclick="document.getElementById('logout').submit()">
                        <i class="feather icon-power text-danger"></i>&nbsp; Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<form action="{{ route('logout') }}" method="POST" id="logout" style="display: none">
    @csrf
    @method('POST')
</form>
{{-- [ Layout navbar ( Header ) ] End --}}
