<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use App\Models\Article;
use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private function getGeneral() {
        $profile = Profile::first();
        $sosmeds = Sosmed::all();
        $menus = Article::select("article_title", "article_url")
            ->where("article_publish", 1)
            ->orderBy("article_title", "asc")
            ->get();

        return [
            'profile' => $profile,
            'sosmeds' => $sosmeds,
            'menus'   => $menus
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general = $this->getGeneral();
        $articles = Article::where('article_publish', 1)->orderBy('article_title', 'asc')->get();

        return view('pages.landing.index', [
            'profile'  => $general['profile'],
            'sosmeds'  => $general['sosmeds'],
            'menus'    => $general['menus'],
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
            'message_name' => htmlspecialchars($request->name),
            'message_email' => htmlspecialchars($request->email),
            'message_description' => htmlspecialchars($request->message),
        ]);

        return redirect()->route('landing.index')->with("success", 'Your message has been sent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Hello";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
