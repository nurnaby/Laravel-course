<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbordContorller extends Controller
{
    public function index(){
        return view("admin.dashboard");
    }
    public function index2(){
        return view("dashboard");
    }
   
}