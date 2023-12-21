<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBk;
use App\Models\Characteristic;
use App\Models\User;
use App\Models\Ldk;

class HomeController extends Controller
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
            'title' => 'Home',
            'master_bk_count' => MasterBk::count(),
            'characteristic_count' => Characteristic::count(),
            'user_count' => User::count(),
            'ldk_count' => Ldk::count(),
        ];

        $data['styles'] = [
            "/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        ];
        $data['scripts'] = [
            "/assets/plugins/tables/js/jquery.dataTables.min.js",
            "/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js",
            "/assets/plugins/tables/js/datatable-init/datatable-basic.min.js",
        ];
        return view('home', $data);
    }
}
