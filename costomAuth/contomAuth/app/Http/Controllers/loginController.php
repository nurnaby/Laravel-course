<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function getlogin(){
        return view('Auth.login');
    }
    public function getRegister(){
        return view('Auth.register');
    }
    public function RegisterAction(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
           'password'=>$request->password
        ]);
        return redirect()->route('login')->with('success','Success! user Registion successfuly');
    }
}