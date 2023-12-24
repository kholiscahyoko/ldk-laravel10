<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ldk;
use App\Models\MasterBk;
use App\Models\Characteristic;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'material_number' => [
                'required',
                Rule::exists(MasterBk::class, 'material_number'),
            ],
            'ldk_number' => 'required|min:5',
            'revision_number' => 'required|numeric',
            'characteristic' => 'required|array',
            'characteristic.*' => Rule::exists(Characteristic::class, 'id'),
        ]);

        $master_bk = MasterBk::where('material_number', $request->material_number)->first();

        if(!$master_bk)
            return redirect('/ldk')->with('error', 'Material Number is invalid');

        if(Ldk::where('material_id', $master_bk->id)->first())
            return redirect('/ldk')->with('error', 'Material Number is already existed');

        $ldk = Ldk::create([
            'material_id' => $master_bk->id,
            'ldk_number' => $request->ldk_number,
            'revision_number' => $request->revision_number,
            'reactivity' => $request->reactivity,
            'composition' => $request->composition,
            'hazard_identification' => $request->hazard_identification,
            'physical_state' => $request->physical_state,
            'colour' => $request->colour,
            'odour' => $request->odour,
            'ph' => $request->ph,
            'melting_point' => $request->melting_point,
            'lfl' => $request->lfl,
            'ufl' => $request->ufl,
            'p3k_eye' => $request->p3k_eye,
            'p3k_skin' => $request->p3k_skin,
            'p3k_ingestion' => $request->p3k_ingestion,
            'p3k_inhalation' => $request->p3k_inhalation,
            'p3k_others' => $request->p3k_others,
            'handling_storage' => $request->handling_storage,
            'spill_leakage' => $request->spill_leakage,
            'disposal' => $request->disposal,
            'ecology_info' => $request->ecology_info,
            'toxicology_info' => $request->toxicology_info,
            'regulation' => $request->regulation,
            'shipping' => $request->shipping,
            'others_info' => $request->others_info,
            'created_by' => Auth::user()->id,
        ]);

        $ldk->characteristic()->attach($request->characteristic);
        return redirect('/ldk')->with('success', 'Data has been saved successfully');
    }


    public function update(Request $request, $id){
        $request->validate([
            'material_number' => [
                'required',
                Rule::exists(MasterBk::class, 'material_number'),
            ],
            'ldk_number' => 'required|min:5',
            'revision_number' => 'required|numeric',
            'characteristic' => 'required|array',
            'characteristic.*' => Rule::exists(Characteristic::class, 'id'),
        ]);

        $master_bk = MasterBk::where('material_number', $request->material_number)->first();

        if(!$master_bk)
            return redirect('/ldk')->with('error', 'Material Number is invalid');

        Validator::make(['material_id' => $master_bk->id], [
            'material_id' => [
                'required',
                Rule::unique(Ldk::class)->ignore($master_bk->id)
            ]
        ]);

        $ldk = Ldk::find($id);
        if(!$ldk)
            return redirect('/ldk')->with('error', 'LDK is not found');

        $ldk->material_id = $master_bk->id;
        $ldk->ldk_number = $request->ldk_number;
        $ldk->revision_number = $request->revision_number;
        $ldk->reactivity = $request->reactivity;
        $ldk->composition = $request->composition;
        $ldk->hazard_identification = $request->hazard_identification;
        $ldk->physical_state = $request->physical_state;
        $ldk->colour = $request->colour;
        $ldk->odour = $request->odour;
        $ldk->ph = $request->ph;
        $ldk->melting_point = $request->melting_point;
        $ldk->lfl = $request->lfl;
        $ldk->ufl = $request->ufl;
        $ldk->p3k_eye = $request->p3k_eye;
        $ldk->p3k_skin = $request->p3k_skin;
        $ldk->p3k_ingestion = $request->p3k_ingestion;
        $ldk->p3k_inhalation = $request->p3k_inhalation;
        $ldk->p3k_others = $request->p3k_others;
        $ldk->handling_storage = $request->handling_storage;
        $ldk->spill_leakage = $request->spill_leakage;
        $ldk->disposal = $request->disposal;
        $ldk->ecology_info = $request->ecology_info;
        $ldk->toxicology_info = $request->toxicology_info;
        $ldk->regulation = $request->regulation;
        $ldk->shipping = $request->shipping;
        $ldk->others_info = $request->others_info;
        $ldk->updated_by = Auth::user()->id;
        $ldk->save();

        $ldk->characteristic()->sync($request->characteristic);
        return redirect('/ldk')->with('success', 'Data has been saved successfully');
    }

    public function get($id){
        $data = Ldk::with('master_bk')->with('characteristic')->find($id);

        if(!$data){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json(['data' => $data]);        
    }

    public function destroy($id){
        $data = Ldk::find($id);
        if(!$data){
            return redirect('/ldk')->with('error', 'Data is not found');
        }

        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = Carbon::now();
        $data->save();

        return redirect('/ldk')->with('success', 'Data has been deleted successfully');
    }
}