<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard-skill.index');
    }

    /**
     * Method untuk mengambil semua data skill dengan ajax
     */
    public function getData()
    {
        $skills = Skill::all();

        return Datatables::of($skills)
            ->addColumn('action', function ($skill) {
                return "
                    <button onclick='handleOpenModalForm(`edit`, {$skill->id})' class='btn btn-sm btn-outline-success btn-round mr-2'>Edit</button>
                    <button onclick='destroy({$skill->id})' class='btn btn-sm btn-outline-danger btn-round'>Delete</button>
                ";
            })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            "skill_name" => "required|string|max:100",
        ]);

        // Cek publist
        $publish = (isset($request->publish) && $request->publish == "on") ? true : false;

        // Tambahkan ke dataabse
        Skill::create([
            "user_id" => Auth::user()->id,
            "skill_name" => htmlspecialchars(strtoupper($request->skill_name)),
            "skill_publish" => $publish
        ]);

        return response()->json([
            "message" => "New skill added successfully"
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return response()->json([
            "data" => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        /// Validasi
        $request->validate([
            "skill_name" => "required|string|max:100",
        ]);

        // cek apakan nama skill sudah digunakan oleh field yang sudah ada tau belum
        if (htmlspecialchars(strtoupper($request->skill_name)) != strtoupper($skill->skill_name)) {
            $request->validate(["skill_name" => 'unique:skills,skill_name']);
        }

        // Cek publist
        $publish = (isset($request->publish) && $request->publish == "on") ? true : false;

        // Tambahkan ke dataabse
        Skill::where('id', $skill->id)->update([
            "user_id" => Auth::user()->id,
            "skill_name" => htmlspecialchars(strtoupper($request->skill_name)),
            "skill_publish" => $publish
        ]);

        return response()->json([
            "message" => "Skill updated successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $delete = Skill::destroy($skill->id);

        if ($delete >= 1) {
            return response()->json([
                "message" => "<strong>{$skill->skill_name}</strong> skill deleted successfuly"
            ], 200);
        }
    }
}
