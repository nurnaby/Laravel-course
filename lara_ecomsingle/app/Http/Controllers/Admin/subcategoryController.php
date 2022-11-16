<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subcategoryController extends Controller
{
    public function index(){
        $subcategoris = subcategory::latest()->get();
        return view('admin.allSubCategory',compact('subcategoris'));
    }
    public function AddSubCategory(){
        $categories = Category::get();
        return view('admin.addSubCategory',compact('categories'));
    }
    public function storSubCategory(Request $request){
       
        $request->validate([
            'subcategory_name'=>'required|unique:subcategories',
            'category_id'=>'required',
        ]);
        $category_id=$request->category_id;
       $category_name=  Category::where('id',$category_id)->value('category_name');
        subcategory::insert([
            'subcategory_name'=>$request->subcategory_name,
            'category_id'=>$category_id,
            'slug'=>strtolower(str_replace(' ','-',$request->sub_category_Name)),
            'category_name'=>$category_name
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('allSubcategory')->with('message','Sub Category add successfully');

    }
    public function editSubCategory($id){
        $subcategory_info = subcategory::findOrFail($id);
        return view('admin.editSubCategory',compact('subcategory_info'));

    }
    public function updateSubCategory(Request $request){
        $subcategory_id = $request->subcategory_id;
        $request->validate([
            'subcategory_name'=>'required|unique:subcategories',
            
        ]);
        subcategory::findOrFail($subcategory_id)->update([
            'subcategory_name'=>$request->subcategory_name,
            'slug'=>strtolower(str_replace(' ','-',$request->sub_category_Name)),
        ]);
        return redirect()->route('allSubcategory')->with('message','Update SubCategory add successfully');
    }
    public function delateSubCategory($id){
        subcategory::findOrFail($id)->delete();
        return redirect()->route('allSubcategory')->with('message','Delete SubCategory Successfully');

    }
}