<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\MasterBk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
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
            'title' => 'Data Location',
            'data' => Location::with('master_bk')->get()
        ];

        $data['styles'] = [
            "/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        ];
        $data['scripts'] = [
            "/assets/plugins/tables/js/jquery.dataTables.min.js",
            "/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js",
            "/assets/plugins/tables/js/datatable-init/datatable-basic.min.js",
            "/assets/plugins/validation/jquery.validate.min.js",
            "/assets/js/location-validation-init.js",
        ];
        return view('location.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request,[
            'material_number' => 'required|min:5',
            'location' => 'required',
            'other_location' => 'required_if:location,other',
            'uom' => 'required',
            'qty' => 'required|numeric',
            'pic_nrp' => 'required|min:5',
            'pic_name' => 'required|min:3',
        ]);

        $material = MasterBk::where('material_number', $request->material_number)->first();

        if(!$material){
            return redirect('/location')->with('error', 'Error Material Number is not found');
        }

        Location::create([
            'material_id' => $material->id,
            'location' => $request->location !== 'other' ? $request->location : $request->other_location,
            'uom' => $request->uom,
            'qty' => $request->qty,
            'pic_nrp' => $request->pic_nrp,
            'pic_name' => $request->pic_name,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);
        return redirect('/location')->with('success', 'Data has been saved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'material_number' => 'required|min:5',
            'location' => 'required',
            'other_location' => 'required_if:location,other',
            'uom' => 'required',
            'qty' => 'required|numeric',
            'pic_nrp' => 'required|min:5',
            'pic_name' => 'required|min:3',
        ]);

        $material = MasterBk::where('material_number', $request->material_number)->first();

        if(!$material){
            return redirect('/location')->with('error', 'Error Material Number is not found');
        }
        Location::find($id)->update([
            'material_id' => $material->id,
            'location' => $request->location,
            'uom' => $request->uom,
            'qty' => $request->qty,
            'pic_nrp' => $request->pic_nrp,
            'pic_name' => $request->pic_name,
            'updated_by' => Auth::user()->id,
        ]);
        return redirect('/location')->with('success', 'Data has been updated successfully');
    }

    public function get($id){
        $data = Location::with('master_bk')->find($id);

        if(!$data){
            return response()->json(['error' => 'Material Number not found'], 404);
        }
        return response()->json(['data' => $data]);        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Location::find($id);
        if(!$data){
            return redirect('/location')->with('error', 'Data is not found');
        }
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = Carbon::now();
        $data->save();

        return redirect('/location')->with('success', 'Data has been deleted successfully');
    }
}
