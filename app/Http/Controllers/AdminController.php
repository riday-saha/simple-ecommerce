<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_index(){
        return view('admin.dashboard');
    }

    public function  pro_category(){
        return view('admin.category');
    }
}
