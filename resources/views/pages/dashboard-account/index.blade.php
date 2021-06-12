@extends('layouts.dashboard.index')

@section('title', 'Account Setting')

@section('breadcrumb')
    <li class="breadcrumb-item active">Account Setting</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="nav-tabs-top mb-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('app/account') ? 'active' : null }}" href="{{ route('dashboard.account') }}">
                            Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('app/account/profile') ? 'active' : null }}" href="{{ route('dashboard.profile') }}">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('app/account/socmed') ? 'active' : null }}" href="{{ route('dashboard.socmed') }}">
                            Social Media
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        @if (Request::is('app/account'))
                            @include('pages.dashboard-account.accountForm')
                        @elseif(Request::is('app/account/profile') )
                            @include('pages.dashboard-account.profileForm')
                        @elseif(Request::is('app/account/socmed') )
                            @include('pages.dashboard-account.socmed')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


