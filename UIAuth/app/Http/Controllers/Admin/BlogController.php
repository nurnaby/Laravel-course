<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['blogCategories'] = BlogCategory::withTrashed()->get();
        $data['blogs'] = Blog::join('blog_categories','blog_categories.id','=','blogs.category')->select('blogs.*','blog_categories.name')->get();

        return view('admin.blog.listData',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['blogCategories']=BlogCategory::get();
        return view('admin.blog.create',$data); 
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
            'category'=> 'required',
            'title'=> 'required',
            'description'=> 'required',
            'thumbnail'=> 'required'
        ]);
        if($validator->passes()){
           
           
            // $obj = new BlogCategory();
            // $obj->name = $request->name;
            // $obj->valid = $request->valid;
            // $obj->save();

            Blog::create([
                'category'=>$request->category,
                'title'=>$request->title,
                'sub-title'=>$request->sub_title,
                'description'=>$request->description,
                'thumbnail'=>self::fileUploader($request->thumbnail,public_path('upload/blogTham')),
                'valid'=>$request->valid,
            ]);
            Toastr::success('blog created successfully','success');
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
       
        $data['blogInfo'] = Blog::find($id);
        $data['blogCategories'] = BlogCategory::get();
        
        return view('admin.blog.edit',$data);
        
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
            'title'=> 'required',
            'valid'=> 'required'
        ]);
        if($validator->passes()){

            Blog::find($id)->update([
                'category'=>$request->category,
                'title'=>$request->title,
                'description'=>$request->description,
                'thumbnail'=>self::fileUploader($request->thumbnail,public_path('upload/blogTham')),
                'valid'=>$request->valid,
                
                
            ]);
            Toastr::success('Blog  update successfully','success');
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
        $blog_delete = Blog::find($id);
        $file_name = $blog_delete->thumbnail;
        $file_path = public_path('upload/blogTham/'.$file_name);
        unlink($file_path);
        $blog_delete->delete();
        return response()->json(['status'=>'blog deleted successfully']);
        // Toastr::success('blog  delete successfully','success');
        return redirect()->back();
    }
    public static function fileUploader($mainFile,$path){
        $fileName= time().'.'.$mainFile->extension();
        $mainFile->move($path,$fileName);
        return $fileName;
    }
    
}