<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkExperience;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\Auth;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard-work-experience.index');
    }

    /**
     * Method untuk mengambil semua data work experience via ajax
     */
    public function getAll()
    {
        return Datatables::of(WorkExperience::all())
            ->addColumn('action', function ($we) {
                return "
                    <button onclick='openModalDetail({$we->id})' class='btn btn-sm btn-outline-info btn-round mr-2'>detail</button>
                    <a href='". route('dashboard.work-experience.edit', ["id" => $we->id]) ."' class='btn btn-sm btn-outline-success btn-round mr-2'>Edit</a>
                    <button onclick='destroy({$we->id})' class='btn btn-sm btn-outline-danger btn-round'>Delete</button>
                ";
            })
            ->addColumn('period', function ($we) {
                return "{$we->we_from} - {$we->we_to}";
            })
            ->addColumn('publish', function ($we) {
                return $we->we_publish == 1 ? 'Yes' : 'No';
            })
            ->editColumn('id', '{{$id}}')
            ->removeColumn('password')
            ->make(true);
    }

    /**
     * Methoh untuk mengambil data work experience berdasarkan id
     *
     * @param mixed $id
     */
    public function detail($id) {
        $work_experience = WorkExperience::findOrfail($id);

        return response()->json([
            'data' => $work_experience,
        ], 200);
    }

    /**
     * Method view halaman create
     */
    public function create()
    {
        return view('pages.dashboard-work-experience.create');
    }

    /**
     * Method untuk menyimpan data baru yang akan ditambahkan
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $max_year = date("Y");
        $min_year = $max_year - 100;

        // Validasi
        $request->validate([
            "field_of_work" => "required|string|max:100",
            "company"       => "required|string|max:100",
            "from_period"   => "required|numeric|max:{$max_year}|min:{$min_year}",
            "to_period"     => "required|numeric|min:{$request->education_from}|max:{$max_year}",
            "description"   => "nullable|string|max:400",
        ]);

        // Cek apakah pendidikan di publis atau tidak
        $publish = (isset($request->publish) && $request->publish == "on") ? true : false;

        // simpan ke database
        WorkExperience::create([
            "user_id" => Auth::user()->id,
            "we_field_of_work" => htmlspecialchars(ucwords($request->field_of_work)),
            "we_company" => htmlspecialchars(ucwords($request->company)),
            "we_from" => htmlspecialchars($request->from_period),
            "we_to" => htmlspecialchars($request->to_period),
            "we_desc" => htmlspecialchars($request->description),
            "we_publish" => $publish
        ]);

        return redirect()->route("dashboard.work-experience")->with('success', 'Work experience data added successfully');
    }

    /**
     * Methoh untuk mengambil data work experience berdasarkan id untuk edit data
     *
     * @param mixed $id
     */
    public function edit($id)
    {
        $we = WorkExperience::findOrfail($id);
        return view('pages.dashboard-work-experience.edit', compact('we'));
    }
}
