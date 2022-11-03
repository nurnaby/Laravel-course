<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::get('/home',[App\Http\Controllers\HomeController::class,'homeIndex']);

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);


   Route::group(['middleware'=>'acountfeerz'],function(){

        Route::get('userCreate',[App\Http\Controllers\Admin\UserController::class,'create']);
        Route::post('users/store',[App\Http\Controllers\Admin\UserController::class,'store']);
        
        Route::get('users/edit/{id}',[App\Http\Controllers\Admin\UserController::class,'edit']);
        Route::put('users/edit/{id}',[App\Http\Controllers\Admin\UserController::class,'update']);
        Route::delete('users/delete/{id}',[App\Http\Controllers\Admin\UserController::class,'delete']);
        
        Route::resource('blogCategory', App\Http\Controllers\Admin\BlogCategoryController::class);
        Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    });
});






// Route::get('/',[App\Http\Controllers\Admin\MasterController::class,'dashboard']);
// Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);