@extends('layouts.dashboard.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/css/pages/messages.css') }}">
@endsection

@section('title', 'Message')

@section('breadcrumb')
    <li class="breadcrumb-item active">Message</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="float-right">
                <a href="{{ route('dashboard.home') }}" class="btn btn-default btn-round">
                    <span class="fas fa-angle-left"></span>  Back
                </a>
            </div>
        </div>
    </div>

    {{-- Alert response delete --}}
    @if (session('deleted'))
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="alert alert-dark-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('deleted') }}
                </div>
            </div>
        </div>
    @elseif(session('failed'))
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="alert alert-dark-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('failed') }}
                </div>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-sm-12">

            {{-- Messages inbox --}}
            <div class="card">

                {{-- Header --}}
                <h4 class="card-header media flex-wrap align-items-center py-4">
                    <span class="media-body"><i class="ion ion-ios-filing"></i> &nbsp; Inbox</span>
                    <form action="{{ route('dashboard.message') }}" method="GET">
                        <input
                            type="search"
                            name="search"
                            class="form-control"
                            placeholder="Search..."
                            style="max-width: 20rem;"
                            value="{{ $search }}"
                        />
                    </form>
                    <span class="clearfix"></span>
                </h4>
                {{-- / Header --}}

                {{-- Controls --}}
                <div class="media flex-wrap align-items-center py-1 px-2">
                    <div class="text-muted mr-3 ml-auto">
                        {{ $messages->firstItem() }} - {{ $messages->lastItem() }} of {{ $messages->total() }}
                    </div>
                    <div class="d-flex flex-wrap">
                        <a href="{{ $messages->previousPageUrl() }}" class="btn btn-default borderless md-btn-flat icon-btn text-muted">
                            <i class="ion ion-ios-arrow-back"></i>
                        </a>

                        <a href="{{ $messages->nextPageUrl() }}" class="btn btn-default borderless md-btn-flat icon-btn text-muted">
                            <i class="ion ion-ios-arrow-forward"></i>
                        </a>
                    </div>
                </div>

                <hr class="border-light m-0">

                {{-- Message list start --}}
                <ul class="list-group messages-list">
                    @foreach ($messages as $message)
                        <li class="list-group-item px-4">
                            <a
                                href="javascript:void(0)"
                                class="fas fa-trash-alt d-block text-lighter text-big mr-3 btn-delete-message"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Delete message"
                                data-id="{{ $message->id }}"
                            ></a>

                            <a href="{{ route('dashboard.message.detail', ['id' => $message->id]) }}" class="message-sender flex-shrink-1 d-block text-dark" >

                                @if ($message->message_read_status === 0)
                                    <span class="badge badge-dot badge-info mr-1"></span>
                                @endif

                                {{ $message->message_name }}
                            </a>

                            <a href="{{ route('dashboard.message.detail', ['id' => $message->id]) }}" class="message-subject flex-shrink-1 d-block text-dark {{ $message->message_read_status == 0 ? 'font-weight-bold' : null }}" >
                                <div class="text-truncate" style="max-width: 500px;">
                                    {{ $message->message_description }}
                                </div>
                            </a>

                            <div class="message-date text-muted">{{ $message->created_at }}</div>
                        </li>
                    @endforeach
                </ul>
                {{-- Message list End --}}

            </div>
            {{-- / Messages inbox --}}

        </div>
    </div>

    {{-- Form delete --}}
    <form id="form-delete-message" method="POST" style="display: none;">
        @method('DELETE')
        @csrf
    </form>
@endsection

@section('script')
    <script src="{{ asset('assets/dashboard-layouts/js/pages/pages_messages.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.btn-delete-message').on('click', function (e) {
                e.preventDefault();

                const id = $(this).attr('data-id');

                bootbox.confirm({
                    title: "Delete",
                    message: "Are you sure you want this message?",
                    buttons: {
                        confirm: {
                            label: 'Delete',
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-outline-secondary'
                        }
                    },
                    callback: result => {
                        if (result) {
                            const form = $('#form-delete-message').attr('action', `{{ url('/app/message') }}/${id}`);
                            form.submit();
                        }
                    }
                });

            });
        })
    </script>
@endsection
