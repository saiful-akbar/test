@extends('layouts.dashboard.index')

@section('title', 'Message Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/css/pages/messages.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('dashboard.message') }}">Message</a>
    </li>
    <li class="breadcrumb-item active">Message Details</li>
@endsection

@section('back')
    <a href="{{ route('dashboard.message') }}" class="btn btn-default btn-round">
        <span class="fas fa-angle-left"></span>  Back
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                {{-- Header --}}
                <div class="media p-4">
                    <div class="media-body pl-3">

                        {{-- Sender & date --}}
                        <div class="mb-1">
                            {{ $message->message_name }}
                            <<a href="mailto:{{ $message->message_email }}?subject={{ $message->message_subject }}">{{ $message->message_email }}</a>>
                            <span class="text-muted ml-2">{{ $message->created_at }}</span>
                        </div>

                        {{-- Subject --}}
                        <h5 class="line-height-inherit m-0">{{ $message->message_subject }}</h5>
                    </div>
                </div>
                <hr class="border-light m-0">
                {{-- End Header --}}

                {{-- Controls --}}
                <div class="media flex-wrap align-items-center py-1 px-2">
                    <div class="media-body d-flex flex-wrap flex-basis-100 flex-basis-sm-auto">
                        <button type="button" id="btn-delete-message" class="btn btn-default borderless btn-lg md-btn-flat icon-btn messages-tooltip text-muted" title="Delete Message" data-toggle="tooltip">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                <hr class="border-light m-0">
                {{-- End Controls --}}

                {{-- Message content --}}
                <div class="p-4">{{ $message->message_description }}</div>
                <hr class="border-light m-0">

            </div>
        </div>
    </div>

    <form name="form-delete-message" action="{{ route('dashboard.message.delete', ['message' => $message->id]) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection


@section('script')
    <script>
        $(function() {
            $('#btn-delete-message').on('click', function (e) {
                e.preventDefault();

                // Bootbox comfirm
                bootbox.confirm({
                    title: "Delete",
                    message: "Are you sure you want this message?",
                    buttons: {
                        confirm: {
                            label: 'Delete',
                            className: 'btn-danger btn-round'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-outline-secondary btn-round'
                        }
                    },
                    callback: result => {
                        if (result) { // jika pesan dihapus
                            $('form[name=form-delete-message]').submit();
                        }
                    }
                });
            });
        })
    </script>
@endsection
