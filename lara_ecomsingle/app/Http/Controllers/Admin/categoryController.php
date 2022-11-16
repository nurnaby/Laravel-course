<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class categoryController extends Controller
{
    public function index(){
        $categories= Category::latest()->paginate(3);
        return view('admin.allCategory',compact('categories'));
    }
    public function AddCategory(){
        return view('admin.addCategory');
    }
    public function storecategory(Request $request){
        $request->validate([
            'category_Name' => 'required|unique:categories', 
        ]);
        Category::insert([
            'category_name'=> $request->category_Name,
            'slug'=>strtolower(str_replace(' ','-',$request->category_Name))
        ]);
        Toastr::success('category created successfully','success');
       return redirect()->route('allcategory');
    }
    public function EditeCategory($id){
            $catagory_info = Category::findOrFail($id);
            
            return view('admin.editCategory',compact('catagory_info'));
    }
    public function updateCategory(Request $request){
        $category_id = $request->category_id;
        $request->validate([
            'category_Name' => 'required|unique:categories', 
        ]);
        Category::findOrFail($category_id)->update([
            'category_name'=> $request->category_Name,
            'slug'=>strtolower(str_replace(' ','-',$request->category_Name))
        ]);
        Toastr::success('category update successfully','success');
       return redirect()->route('allcategory');

    }
    public function deleteCategory($id){
        Category::findOrFail($id)->delete();
        Toastr::success('category delete successfully','success');

        // return redirect()->route('allcategory');
    }
}