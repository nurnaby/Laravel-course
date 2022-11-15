<?php

use App\Models\Post;
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
// $comment = Post::find(2)->comments;

// return $comment;
$posts = Post::with('comments')->get();

// return $posts;
    
    return view('welcome',compact('users','posts'));
});