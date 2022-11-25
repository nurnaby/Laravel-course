<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        $products = product::latest()->paginate(5);
        return view('product',compact('products'));
    }
    // add product 
    public function addProduct(Request $request){
                $request->validate(
                    [
                        'name'=>'required|unique:products',
                        'price'=>'required',
                    ],
                    [
                        'name.required'=>'Name is Required',
                        'name.unique'=>'Product Already  Exists',
                        'price.required'=>'price filed Required',
                    ]
            );
            $product = new product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->save();
            return response()->json([
                'status' =>'success',
            ]);
    }
}