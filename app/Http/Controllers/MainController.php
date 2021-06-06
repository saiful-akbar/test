<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\WorkExperience;

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
        $skills = Skill::where("skill_publish", 1)->orderBy('skill_name', 'asc')->get();
        $educations = Education::where('education_publish', 1)->orderBy('education_from', 'desc')->get();
        $work_experiences = WorkExperience::where('we_publish', 1)->orderBy('we_from', 'desc')->get();

        return view("pages.main-home.index", compact('profile', 'skills', 'educations', 'work_experiences'));
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
