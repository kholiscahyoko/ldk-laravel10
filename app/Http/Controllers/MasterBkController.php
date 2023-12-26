<?php

namespace App\Http\Controllers;

use App\Models\MasterBk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MasterBkController extends Controller
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
            'title' => 'Data Master BK',
            'data_master_bk' => MasterBk::all()
        ];

        $data['styles'] = [
            "/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        ];
        $data['scripts'] = [
            "/assets/plugins/tables/js/jquery.dataTables.min.js",
            "/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js",
            "/assets/plugins/tables/js/datatable-init/datatable-basic.min.js",
            "/assets/plugins/validation/jquery.validate.min.js",
            "/assets/js/master_bk-validation-init.js",
            "/assets/js/ldk-validation-init.js",
        ];
        return view('master_bk.list', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'material_number' => 'required|min:5',
            'material_desc' => 'required|min:5',
            'maker' => 'required|min:2',
            'ldk_fr_maker' => 'required|mimes:pdf|max:10240',
        ]);

        $ldk_ori_filename = $request->file('ldk_fr_maker')->getClientOriginalName();
        $safeFileName = Str::slug(pathinfo($ldk_ori_filename, PATHINFO_FILENAME));
        $uuid = Str::uuid();
        $newFileName = $uuid . '_' . $safeFileName;

        $pdfPath = $request->file('ldk_fr_maker')->storeAs('ldk_fr_maker', $newFileName, 'public');

        MasterBk::create([
            'material_number' => $request->material_number,
            'material_desc' => $request->material_desc,
            'maker' => $request->maker,
            'ldk_fr_maker' => $pdfPath,
            'created_by' => Auth::user()->id
        ]);
        return redirect('/master_bk')->with('success', 'Data has been saved successfully');
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'material_number' => 'required|min:5',
            'material_desc' => 'required|min:5',
            'maker' => 'required|min:2',
            // 'ldk_fr_maker' => 'required|mimes:pdf|max:10240',
        ]);

        $data = MasterBk::find($id);

        if(!$data){
            return redirect('/master_bk')->with('error', 'Data is not found');
        }

        if($data->status_bk === '1'){
            $data->status_bk = '0';
        }

        $data->material_number = $request->material_number;
        $data->material_desc = $request->material_desc;
        $data->maker = $request->maker;
        $data->updated_by = Auth::user()->id;

        if($request->hasFile('ldk_fr_maker')){
            if(!empty($data->ldk_fr_maker)){
                Storage::delete($data->ldk_fr_maker);
            }
            $ldk_ori_filename = $request->file('ldk_fr_maker')->getClientOriginalName();
            $safeFileName = Str::slug(pathinfo($ldk_ori_filename, PATHINFO_FILENAME));
            $uuid = Str::uuid();
            $newFileName = $uuid . '_' . $safeFileName;
            $pdfPath = $request->file('ldk_fr_maker')->storeAs('ldk_fr_maker', $newFileName, 'public');
            $data->ldk_fr_maker = $pdfPath;
        }

        $data->save();
        return redirect('/master_bk')->with('success', 'Data has been updated successfully');
    }

    public function reject(Request $request, $id){
        $this->validate($request,[
            'comment' => 'required',
        ]);

        $data = MasterBk::find($id);

        if(!$data){
            return redirect('/master_bk')->with('error', 'Data is not found');
        }

        $data->comment = $request->comment;
        $data->status_bk = '1';
        $data->updated_by = Auth::user()->id;

        $data->save();
        return redirect('/master_bk')->with('success', 'Data has been updated successfully');
    }

    public function get($id){
        $data = MasterBk::with(['createdBy', 'updatedBy'])->find($id);

        if(!$data){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json(['data' => $data]);        
    }

    public function getByMaterialNumber($material_number){
        $data = MasterBk::where('material_number', $material_number)->first();

        if(!$data){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json(['data' => $data]);        
    }

    public function destroy($id){
        $data = MasterBk::find($id);
        if(!$data){
            return redirect('/master_bk')->with('error', 'Data is not found');
        }

        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = Carbon::now();
        $data->save();

        return redirect('/master_bk')->with('success', 'Data has been deleted successfully');
    }

}
