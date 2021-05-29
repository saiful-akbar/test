<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::where('user_id', Auth::user()->id)
            ->orderBy('education_from', 'desc')
            ->get();

        return view('pages.dashboard-education.index', compact('educations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function detail(Education $education)
    {
        return response()->json([
            'education' => $education
        ], 200);
    }

    public function create() {
        return view('pages.dashboard-education.create');
    }
}
