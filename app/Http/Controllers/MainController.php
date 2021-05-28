<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::where("skill_publish", 1)->get();

        return view("pages.main-home.index", [
            "profile" => $profile,
            "skills"  => $skills
        ]);
    }

    /**
     * Method untuk mengirim pesan
     *
     * @param Request $request
     */
    public function sendMessage(Request $request) {
        $request->validate([
            "name"    => "required|string|max:100",
            "email"   => "required|email:filter|max:100",
            "subject" => "required|string|max:100",
            "message" => "required|string|max:200"
        ]);

        Message::create([
            "message_name"        => htmlspecialchars($request->name),
            "message_email"       => htmlspecialchars($request->email),
            "message_subject"     => htmlspecialchars($request->subject),
            "message_description" => htmlspecialchars($request->message),
            "message_read_status" => false,
        ]);

        return response()->json([
            "message" => "Thank you {$request->name}, your message has been sent",
        ], 200);
    }
}
