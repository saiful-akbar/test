<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socmed;
use Yajra\DataTables\Datatables;

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
                    <button class='btn btn-sm btn-outline-success btn-round mr-2'>Edit</button>
                    <button class='btn btn-sm btn-outline-danger btn-round'>Delete</button>
                ";
            })->make(true);
    }
}
