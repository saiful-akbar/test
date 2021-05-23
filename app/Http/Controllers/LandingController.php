<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use App\Models\Article;
use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $general_profile;
    private $general_sosmeds;
    private $general_menus;

    function __construct() {
        $this->general_profile = Profile::first();
        $this->general_sosmeds = Sosmed::all();
        $this->general_menus = Article::select("article_title", "article_url")
            ->where("article_publish", 1)
            ->orderBy("article_title", "asc")
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('article_publish', 1)->orderBy('article_title', 'asc')->get();

        return view('pages.landing.index', [
            'profile'  => $this->general_profile,
            'sosmeds'  => $this->general_sosmeds,
            'menus'    => $this->general_menus,
            'articles' => $articles,
        ]);
    }

    /**
     * Method untuk mengirim pesan
     *
     * @param Request $request
     */
    public function sendMessage(Request $request) {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email:rfc,dns|max:100',
            'message' => 'required|string|max:200'
        ]);

        Message::create([
            'message_name'        => htmlspecialchars($request->name),
            'message_email'       => htmlspecialchars($request->email),
            'message_description' => htmlspecialchars($request->message),
            'message_read_status' => false,
        ]);

        return redirect()->route('landing.index')->with("success", 'Your message has been sent');
    }
}
