<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;



class BlogCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['blogCategories'] = BlogCategory::withTrashed()->get();
        $data['blogCategories'] = BlogCategory::get();

        return view('admin.blogCategory.listData',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogCategory.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = validator::make($request->all(),[
            'name'=> 'required',
            'valid'=> 'required'
        ]);
        if($validator->passes()){
            // $obj = new BlogCategory();
            // $obj->name = $request->name;
            // $obj->valid = $request->valid;
            // $obj->save();

            BlogCategory::create([
                'name'=>$request->name,
                'valid'=>$request->valid,
            ]);
            Toastr::success('Category created successfully','success');
        }else{
            $errMsgs = $validator->messages();
            foreach($errMsgs->all() as $msg){

                Toastr::error($msg,'Required');
            }

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['blogCategoryInfo'] =BlogCategory::find($id);
        
        return view('admin.blogCategory.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(),[
            'name'=> 'required',
            'valid'=> 'required'
        ]);
        if($validator->passes()){

            BlogCategory::find($id)->update([
                'name'=>$request->name,
                'valid'=>$request->valid,
                
                
            ]);
            Toastr::success('Blog Category update successfully','success');
        }else{
            $errMsgs = $validator->messages();
            foreach($errMsgs->all() as $msg){

                Toastr::error($msg,'Required');
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::find($id)->delete();
        Alert::warning('delete', 'delete bloge categoriy');


        Toastr::success('blog Category delete successfully','success');
        return redirect()->back();
    }
    
}