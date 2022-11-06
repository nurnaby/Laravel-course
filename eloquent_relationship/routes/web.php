<?php

use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $phone = User::find(1);
    $phone = User::find(2)->phone;
// return $phone;
$user = Phone::find(3)->user;
// return $user;
$users = User::all();
// return $users;
    
    return view('welcome',compact('users'));
});