<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class UserController extends Controller
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
            'title' => 'Data User',
            'data_user' => User::all()
        ];

        $data['styles'] = [
            "/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        ];

        $data['scripts'] = [
            "/assets/plugins/tables/js/jquery.dataTables.min.js",
            "/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js",
            "/assets/plugins/tables/js/datatable-init/datatable-basic.min.js",
            "/assets/plugins/validation/jquery.validate.min.js",
            "/assets/js/user-validation-init.js",
        ];
        return view('user.list', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'email',
            'password' => 'required|confirmed|min:3'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nrp' => $request->nrp,
            'organization' => $request->organization,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/user')->with('success', 'Data has been saved successfully');
    }

    public function update(Request $request, $id){
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'nrp' => $request->nrp,
            'organization' => $request->organization,
            'updated_at' => Carbon::now()
        ]);
        return redirect('/user')->with('success', 'Data has been updated successfully');
    }

    public function get($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json(['user' => $user]);        
    }

    public function destroy($id){
        User::where('id', $id)->delete();
        return redirect('/user')->with('success', 'Data has been deleted successfully');
    }
}
