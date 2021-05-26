@php
use App\Models\Message;

$all_message = Message::count();
$new_message = Message::where('message_read_status', 0)->count();
$messages = Message::orderBy('message_read_status', 'asc')
    ->orderBy('created_at', 'desc')
    ->offset(0)
    ->limit(5)
    ->get();

@endphp


<div class="demo-navbar-messages nav-item dropdown mr-lg-3">
    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
        <i class="feather icon-mail navbar-icon align-middle"></i>

        @if ($new_message > 0)
            <span class="badge badge-success badge-dot indicator"></span>
        @endif

        <span class="d-lg-none align-middle">&nbsp; Messages</span>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
        <div class="bg-primary text-center text-white font-weight-bold p-3">
            @if ($all_message > 0 && $new_message > 0)
                {{ $new_message }} New message
            @elseif ($all_message > 0 && $new_message <= 0)
                All messages have been read
            @else
                No Message
            @endif
        </div>

        <div class="list-group list-group-flush">
            @foreach ($messages as $message)
                <a  href="{{ route('dashboard.message.detail', ['message' => $message->id]) }}" class="list-group-item list-group-item-action media d-flex align-items-center" >
                    <div class="ui-icon ui-icon-sm feather icon-message-square border-0 text-white {{ $message->message_read_status == 1 ? 'bg-secondary' : 'bg-success' }}"></div>
                    <div class="media-body ml-3">
                        <div class="text-dark line-height-condenced text-truncate" style="max-width: 200px;">
                            {{ $message->message_name }}
                        </div>
                        <div class="text-light small mt-1 text-truncate" style="max-width: 250px;">
                            {{ $message->message_subject }} - {{ $message->message_description }}
                        </div>
                        <div class="text-light small mt-1">
                            {{ $message->created_at }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <a href="{{ route('dashboard.message') }}" class="d-block text-center text-light small p-2 my-1">Show all messages</a>
    </div>
</div>
