<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Message;
use App\Models\Profile;
use App\Models\WorkExperience;
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

        return view("pages.main-home.index", compact('profile'));
    }

    /**
     * Method view about page
     */
    public function about()
    {
        $profile = Profile::first();
        $skills = Skill::where('skill_publish', 1)->orderBy('skill_name', 'asc')->get();

        return view('pages.main-about.index', compact('profile', 'skills'));
    }

    /**
     * Method view resume
     */
    public function resume()
    {
        $educations = Education::where('education_publish', 1)->orderBy('education_to', 'desc')->get();
        $work_experiences = WorkExperience::where('we_publish', 1)->orderBy('we_to', 'desc')->get();

        return view('pages.main-resume.index', compact('educations', 'work_experiences'));
    }

    /**
     * Method view contact page
     */
    public function contact()
    {
        $profile = Profile::first();
        return view('pages.main-contact.index', compact('profile'));
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
            "message_name"        => htmlspecialchars(ucwords($request->name)),
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
