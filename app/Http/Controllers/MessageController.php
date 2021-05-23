<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Method untuk halaman message
     *
     * @param Request $request
     */
    public function index(Request $request) {

        $search = htmlspecialchars($request->search);

        $messages = Message::where("message_name", 'like', "%{$search}%")
            ->orWhere("message_description", 'like', "%{$search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.dashboard-message.index', [
            'messages' => $messages,
            'search' => $search
        ]);
    }

    public function delete(Message $message) {
        $delete = Message::destroy($message->id);

        if($delete >= 1) {
            return redirect()->route('dashboard.message')->with('deleted', 'Message deleted successfully');
        }

        return redirect()->route('dashboard.message')->with('failed', 'Message failed to delete');

    }
}
