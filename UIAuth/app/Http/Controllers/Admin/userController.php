<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    
    public function index(){
        $data['users'] = User::get();
        return view('admin.users.listData',$data);
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        
        $validator = validator::make($request->all(),[
            'name'=> 'required',
            'email'=> 'required|email'
        ]);
        if($validator->passes()){

            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
            ]);
            Toastr::success('User created successfully','success');
        }else{
            $errMsgs = $validator->messages();
            foreach($errMsgs->all() as $msg){

                Toastr::error($msg,'Required');
            }

        }

        return redirect()->back();
        
    }
    public function edit($id){
        $data ['userInfo'] =User::find($id);
        
        return view('admin.users.edit',$data);
    }
    public function update(Request $request,$id){
        $validator = validator::make($request->all(),[
            'name'=> 'required',
            'email'=> 'required|email'
        ]);
        if($validator->passes()){

            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                
            ]);
            Toastr::success('User update successfully','success');
        }else{
            $errMsgs = $validator->messages();
            foreach($errMsgs->all() as $msg){

                Toastr::error($msg,'Required');
            }
        }
        return redirect()->back();
    }

    public function delete($id){
        User::find($id)->delete();
        Toastr::success('User delete successfully','success');
        return redirect()->back();


    }
}