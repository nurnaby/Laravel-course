<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function categoryPage($id){
        $category = Category::findOrFail($id);
        $products = product::where('product_categroy_id',$id)->latest()->get();
        // dd($products);
        return view('user.category',compact('category','products'));
    }
    public function SingleProduct($id){
        $data['products'] = product::findOrFail($id);
        $sub_cat_id = product::where('id',$id)->value('product_subcategory_id');
        
        $data['related_products'] = product::where('product_subcategory_id',$sub_cat_id)->latest()->get();
       
        
        return view('user.singleProduct',$data);
    }
    public function AddTocart(){
        return view('user.AddTocart');
    }
    public function checkout(){
        return view('user.checkout');
    }
    public function userProfile(){
        return view('user.userProfile');
    }
    public function todayDeal(){
        return view('user.todayDeal');
    }
    public function newReleases(){
        return view('user.newReleases');
    }
    public function costomerService(){
        return view('user.costomerService');
    }
}