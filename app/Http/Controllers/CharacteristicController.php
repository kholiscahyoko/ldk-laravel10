<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Characteristic;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CharacteristicController extends Controller
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
            'title' => 'Data Characteristic',
            'data' => Characteristic::all()
        ];

        $data['styles'] = [
            "/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        ];
        $data['scripts'] = [
            "/assets/plugins/tables/js/jquery.dataTables.min.js",
            "/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js",
            "/assets/plugins/tables/js/datatable-init/datatable-basic.min.js",
            "/assets/plugins/validation/jquery.validate.min.js",
            "/assets/js/characteristic-validation-init.js",
        ];
        return view('characteristic.list', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'characteristic_name' => 'required|min:5',
            'notes' => 'required|min:5',
            'pictogram' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pictogram_ori_filename = $request->file('pictogram')->getClientOriginalName();
        $safeFileName = Str::slug(pathinfo($pictogram_ori_filename, PATHINFO_FILENAME));
        $uuid = Str::uuid();
        $newFileName = $uuid . '_' . $safeFileName . "." . $request->pictogram->extension();

        $imgPath = $request->file('pictogram')->storeAs('pictogram', $newFileName, 'public');

        Characteristic::create([
            'characteristic_name' => $request->characteristic_name,
            'notes' => $request->notes,
            'pictogram' => $imgPath,
        ]);
        return redirect('/characteristic')->with('success', 'Data has been saved successfully');
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'characteristic_name' => 'required|min:5',
            'notes' => 'required|min:5',
            // 'pictogram' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = Characteristic::find($id);

        if(!$data){
            return redirect('/characteristic')->with('error', 'Data is not found');
        }

        $data->characteristic_name = $request->characteristic_name;
        $data->notes = $request->notes;

        if($request->hasFile('pictogram')){
            if(!empty($data->pictogram)){
                Storage::delete($data->pictogram);
            }
            $pictogram_ori_filename = $request->file('pictogram')->getClientOriginalName();
            $safeFileName = Str::slug(pathinfo($pictogram_ori_filename, PATHINFO_FILENAME));
            $uuid = Str::uuid();
            $newFileName = $uuid . '_' . $safeFileName;
            $imgPath = $request->file('pictogram')->storeAs('pictogram', $newFileName, 'public');
            $data_update['pictogram'] = $imgPath;
            $data->pictogram = $imgPath;
        }

        $data->save();
        return redirect('/characteristic')->with('success', 'Data has been updated successfully');
    }

    public function get($id){
        $data = Characteristic::find($id);

        if(!$data){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json(['data' => $data]);        
    }

    public function getAll(){
        $data = Characteristic::all();

        if(!$data){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json(['data' => $data]);        
    }

    public function destroy($id){
        $data = Characteristic::find($id);
        if(!$data){
            return redirect('/characteristic')->with('error', 'Data is not found');
        }

        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = Carbon::now();
        $data->save();

        return redirect('/characteristic')->with('success', 'Data has been deleted successfully');
    }


}
