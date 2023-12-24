<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ldk;
use App\Models\MasterBk;
use Illuminate\Support\Carbon;

class LdkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Lembar Data Keselamatan',
            'data' => Ldk::all()
        ];

        $data['styles'] = [
            "/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        ];
        $data['scripts'] = [
            "/assets/plugins/tables/js/jquery.dataTables.min.js",
            "/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js",
            "/assets/plugins/tables/js/datatable-init/datatable-basic.min.js",
            "/assets/plugins/validation/jquery.validate.min.js",
            "/assets/js/ldk-validation-init.js",
        ];
        return view('ldk.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request,[
            'material_number' => 'required|min:5|exists:master_bk.material_number',
            'ldk_number' => 'required|min:5',
            'revision_number' => 'required|numeric',
            'composition' => 'required|min:3',
            'hazard_identification' => 'required|min:5',
            'melting_point' => 'required|min:2',
            'colour' => 'required|min:2',
            'odour' => 'required|min:2',
            'ph' => 'required|min:2',
            'physical_state' => 'required|min:2',
            'characteristic' => 'required|array',
            'characteristic.*' => 'exist:characteristid.id',
        ]);

        $ldk = Ldk::create([
            'ldk_number' => $request->ldk_number,
            'revision_number' => $request->revision_number,
            'composition' => $request->composition,
            'hazard_identification' => $request->hazard_identification,
            'melting_point' => $request->melting_point,
            'colour' => $request->colour,
            'odour' => $request->odour,
            'ph' => $request->ph,
            'physical_state' => $request->physical_state,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $ldk->characteristic()->attach($request->characteristic);
        return redirect('/ldk')->with('success', 'Data has been saved successfully');
    }


}
