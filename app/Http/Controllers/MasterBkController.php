<?php

namespace App\Http\Controllers;

use App\Models\MasterBk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'creator_id' => Auth::user()->id,
            'modifier_id' => Auth::user()->id,
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

        $master_bk = MasterBk::find($id);

        if(!$master_bk){
            return redirect('/master_bk')->with('error', 'Data is not found');
        }

        $data_update = [
            'material_number' => $request->material_number,
            'material_desc' => $request->material_desc,
            'maker' => $request->maker,
            'ldk_fr_maker' => $master_bk->ldk_fr_maker,
            'updated_at' => Carbon::now(),
            'modifier_id' => Auth::user()->id,
        ];

        if($request->hasFile('ldk_fr_maker')){
            if(!empty($master_bk->ldk_fr_maker)){
                Storage::delete($master_bk->ldk_fr_maker);
            }
            $ldk_ori_filename = $request->file('ldk_fr_maker')->getClientOriginalName();
            $safeFileName = Str::slug(pathinfo($ldk_ori_filename, PATHINFO_FILENAME));
            $uuid = Str::uuid();
            $newFileName = $uuid . '_' . $safeFileName;
            $pdfPath = $request->file('ldk_fr_maker')->storeAs('ldk_fr_maker', $newFileName, 'public');
            $data_update['ldk_fr_maker'] = $pdfPath;
        }

        $master_bk = MasterBk::find($id)->update($data_update);
        return redirect('/master_bk')->with('success', 'Data has been updated successfully');
    }

    public function get($id){
        $master_bk = MasterBk::find($id);

        if(!$master_bk){
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json(['master_bk' => $master_bk]);        
    }

    public function destroy($id){
        $master_bk = MasterBk::find($id);
        if(!$master_bk){
            return redirect('/master_bk')->with('error', 'Data is not found');
        }

        if(!empty($master_bk->ldk_fr_maker)){
            Storage::delete($master_bk->ldk_fr_maker);
        }
        
        $master_bk->delete();

        return redirect('/master_bk')->with('success', 'Data has been deleted successfully');
    }

}
