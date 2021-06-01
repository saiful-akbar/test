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
    public function index(Request $request)
    {
        $search = htmlspecialchars($request->search);

        $educations = Education::where("education_level", 'like', "%{$search}%")
            ->orWhere("education_school", 'like', "%{$search}%")
            ->orWhere("education_from", 'like', "%{$search}%")
            ->orWhere("education_to", 'like', "%{$search}%")
            ->orderBy("education_from", "desc")
            ->orderBy("updated_at", "desc")
            ->paginate(5)
            ->withQueryString();

        return view("pages.dashboard-education.index", compact("educations"));
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
            "education" => $education
        ], 200);
    }

    /**
     * Method halaman create aducation
     */
    public function create() {
        return view("pages.dashboard-education.create");
    }

    /**
     * Method create data education
     *
     * @param Request $request
     */
    public function store(Request $request) {
        $max_year = date("Y");
        $min_year = $max_year - 100;

        // Validasi
        $request->validate([
            "education_level"   => "required|string|max:100",
            "education_school"  => "required|string|max:100",
            "education_from"    => "required|numeric|max:{$max_year}|min:{$min_year}",
            "education_to"      => "required|numeric|min:{$request->education_from}|max:{$max_year}",
            "education_desc"    => "nullable|string|max:400",
        ]);

        // Cek apakah pendidikan di publis atau tidak
        $publish = (isset($request->education_publish) && $request->education_publish == "on") ? true : false;

        // Simpan ke database
        Education::create([
            "user_id"           => Auth::user()->id,
            "education_level"   => htmlspecialchars(ucwords($request->education_level)),
            "education_school"  => htmlspecialchars(ucwords($request->education_school)),
            "education_from"    => htmlspecialchars($request->education_from),
            "education_to"      => htmlspecialchars($request->education_to),
            "education_desc"    => htmlspecialchars($request->education_desc),
            "education_publish" => $publish
        ]);

        // kembali ke halaman list education dengan pesan sukses
        return redirect()->route('dashboard.education')->with("success", "New education added successfully");
    }

    /**
     * Method halaman edit
     *
     * @param Education $education
     */
    public function edit(Education $education) {
        return view('pages.dashboard-education.edit', compact("education"));
    }

    /**
     * Method update education
     *
     * @param Request $request
     * @param Education $education
     */
    public function update(Request $request, Education $education) {
        $max_year = date("Y");
        $min_year = $max_year - 100;

        // Validasi
        $request->validate([
            "education_level"   => "required|string|max:100",
            "education_school"  => "required|string|max:100",
            "education_from"    => "required|numeric|max:{$max_year}|min:{$min_year}",
            "education_to"      => "required|numeric|min:{$request->education_from}|max:{$max_year}",
            "education_desc"    => "nullable|string|max:400",
        ]);

        // Cek apakah pendidikan di publis atau tidak
        $publish = (isset($request->education_publish) && $request->education_publish == "on") ? true : false;

        // Update pada database
        Education::where("id", $education->id)->update([
            "education_level"   => htmlspecialchars(ucwords($request->education_level)),
            "education_school"  => htmlspecialchars(ucwords($request->education_school)),
            "education_from"    => htmlspecialchars($request->education_from),
            "education_to"      => htmlspecialchars($request->education_to),
            "education_desc"    => htmlspecialchars($request->education_desc),
            "education_publish" => $publish
        ]);

        // kembali ke halaman list education dengan pesan sukses
        return redirect()->route('dashboard.education')->with("success", "Education updated successfully");
    }

    public function delete(Education $education) {
        $delete = Education::destroy($education->id);

        if ($delete >= 1) { // Cek apakah data berhasil di hapus atau tidak
            return redirect()->route('dashboard.education')->with("success", "Educational data deleted successfully");
        } else {
            return redirect()->route('dashboard.education')->with("failed", "Educational data failed to be deleted");
        }

    }


}
