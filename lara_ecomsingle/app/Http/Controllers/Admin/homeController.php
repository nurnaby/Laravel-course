<?php

namespace App\Http\Controllers\Admin;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function index(){
        $products = product::latest()->get();
        return view('home',compact('products'));
    }
}