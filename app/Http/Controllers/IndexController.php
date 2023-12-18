<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Login'
        ];

        $data['styles'] = [
            "/assets/css/style.min.css"
        ];
        $data['scripts'] = [
            "/assets/plugins/common/common.min.js",
            "/assets/js/custom.min.js",
            "/assets/js/settings.js",
            "/assets/js/gleek.js",
            "/assets/js/styleSwitcher.js",
        
        ];

        // var_dump($data);die();
        
        return view('index', $data);
    }
}
