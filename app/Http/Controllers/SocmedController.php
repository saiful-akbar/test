<?php

namespace App\Http\Controllers;

use App\Models\Socmed;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\Auth;

class SocmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socmeds = Socmed::all();
        return view('pages.dashboard-account.index', compact('socmeds'));
    }

    /**
     * Method dataTable
     */
    public function dataTable()
    {
        $socmeds = Socmed::all();
        return Datatables::of($socmeds)
            ->addColumn('action', function ($socmed) {
                return "
                    <button onclick='handleOpenModalForm(`Edit`, {$socmed->id})' class='btn btn-sm btn-outline-success btn-round mr-2'>Edit</button>
                    <button onclick='destroy({$socmed->id})' class='btn btn-sm btn-outline-danger btn-round'>Delete</button>
                ";
            })
            ->setRowClass(function ($socmed) {
                return $socmed->socmed_publish == 0 ? 'alert-danger' : null;
            })
            ->make(true);
    }

    /**
     * Method add social media
     *
     * @param Request $request
     *
     * @return JSON
     */
    public function store(Request $request)
    {
        $request->validate([
            "socmed_name" => "required|string|max:100",
            "socmed_icon" => "required|string|max:100",
            "socmed_url"  => "required|string|max:200"
        ]);

        // validasi publish
        $publish = (isset($request->socmed_publish) && $request->socmed_publish == "on") ? true : false;

        // tambahkan ke database
        Socmed::create([
            "user_id"        => Auth::user()->id,
            "socmed_name"    => htmlspecialchars(ucwords($request->socmed_name)),
            "socmed_icon"    => htmlspecialchars(strtolower($request->socmed_icon)),
            "socmed_url"     => htmlspecialchars($request->socmed_url),
            "socmed_publish" => $publish
        ]);

        // response
        return response()->json([
            "message" => "Social media added successfully",
        ], 200);
    }

    /**
     * Method edit social media
     *
     * @param Socmed $socmed
     *
     * @return JSON
     */
    public function edit(Socmed $socmed)
    {
        return response()->json([
            "data" => $socmed
        ], 200);
    }

    /**
     * Method update data social media
     *
     * @param Request $request
     * @param Socmed $socmed
     *
     * @return JSON
     */
    public function update(Request $request, Socmed $socmed)
    {
        $request->validate([
            "socmed_name" => "required|string|max:100",
            "socmed_icon" => "required|string|max:100",
            "socmed_url"  => "required|string|max:200"
        ]);

        // validasi publish
        $publish = (isset($request->socmed_publish) && $request->socmed_publish == "on") ? true : false;

        // update pada database
        Socmed::where('id', $socmed->id)->update([
            "user_id"        => Auth::user()->id,
            "socmed_name"    => htmlspecialchars(ucwords($request->socmed_name)),
            "socmed_icon"    => htmlspecialchars(strtolower($request->socmed_icon)),
            "socmed_url"     => htmlspecialchars($request->socmed_url),
            "socmed_publish" => $publish
        ]);

        // response
        return response()->json([
            "message" => "Social media updated successfully",
            "request" => $request->all()
        ], 200);
    }

    /**
     * Method delete data social media
     *
     * @param Socmed $socmed
     *
     * @return JSON
     */
    public function delete(Socmed $socmed)
    {
        // hapus dari database
        $delete = Socmed::destroy($socmed->id);

        if ($delete >= 1) {
            return response()->json([
                "message" => "<strong>{$socmed->socmed_name}</strong> social media deleted successfuly"
            ], 200);
        }
    }
}
