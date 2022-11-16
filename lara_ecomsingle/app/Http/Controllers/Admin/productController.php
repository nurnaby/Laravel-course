<?php

namespace App\Http\Controllers\Admin;

use App\Models\product;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class productController extends Controller
{
    public function index(){
        $products = product::latest()->get();
        
        return view('admin.allProduct',compact('products'));
    }
    public function AddProduct(){
        $subcategoris = subcategory::latest()->get();
        $categoris    = Category   ::latest()->get();
        return view('admin.addProduct',compact('subcategoris','categoris'));
    }
    public function StorProduct(Request $request){

            $request->validate([
                'product_name'           => 'required|unique:products',
                'price'                  => 'required',
                'quantity'               => 'required',
                'product_long_des'       => 'required',
                'product_short_des'      => 'required',
                'product_categroy_id'    => 'required',
                'product_subcategory_id' => 'required',
                'product_img'            => 'required|image|mimes: jpeg,png,jpg,gif,svg|max: 2048',
            ]);
            $image = $request->file('product_img');
            $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $request->product_img->move(public_path('upload'),$img_name);
            $img_url = 'upload/'.$img_name;

            $category_id      = $request->product_categroy_id;
            $SubCategory_id   = $request->product_subcategory_id;

       $category_name=  Category::where('id',$category_id)->value('category_name');
       $Subcategory_name=  subcategory::where('id',$SubCategory_id)->value('subcategory_name');
            product::insert([
                'product_name'             => $request->product_name,
                'product_short_des'        => $request->product_short_des,
                'product_long_des'         => $request->product_long_des,
                'price'                    => $request->price,
                'product_category_name'    => $category_name,
                'product_subcategory_name' => $Subcategory_name,
                'product_categroy_id'      => $request->product_categroy_id,
                'product_subcategory_id'   => $request->product_subcategory_id,
                'product_img'              => $img_url,
                'quantity'                 => $request->quantity,
                'slug'                     => strtolower(str_replace(' ','-',$request->product_name)),
            ]);
        Category::where('id',$category_id)->increment('product_count',1);
        subcategory::where('id',$SubCategory_id)->increment('product_count',1);
        return redirect()->route('allProduct')->with('message','Product  add successfully');
    }

    public function EditProduct($id){
        $product_info = product::find($id);
        return view('admin.editProduct',compact('product_info'));
    
    }
    public function UpdateProduct(Request $request){
        $request->validate([
            'product_name'           => 'required|unique:products',
            'price'                  => 'required',
            'quantity'               => 'required',
            'product_long_des'       => 'required',
            'product_short_des'      => 'required',
        ]);
        $product_id =$request->product_id;
        product::findOrFail($product_id)->update([
            'product_name'             => $request->product_name,
            'product_short_des'        => $request->product_short_des,
            'product_long_des'         => $request->product_long_des,
            'price'                    => $request->price,
            'quantity'                 => $request->quantity,
            'slug'                     => strtolower(str_replace(' ','-',$request->product_name)),
        ]);
        return redirect()->route('allProduct')->with('message','Product  update  successfully');

    }
    public function deleteProduct($id){
        product::findOrFail($id)->delete();
        return redirect()->route('allProduct')->with('message','Product Delete successfully');
    }
}