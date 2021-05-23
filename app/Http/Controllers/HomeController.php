<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Method halaman home dashboard
     */
    public function index() {
        return view('pages.dashboard-home.index');
    }
}
