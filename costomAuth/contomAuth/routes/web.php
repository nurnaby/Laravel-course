<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

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
    // return view('Auth.login');
    return redirect()->route('login');
});

Route::get('login', [loginController::class, 'getlogin'])->name('login');
// Route::get('login', [loginController::class, 'loginAction'])->name('login');
Route::get('register', [loginController::class, 'getRegister'])->name('register');
Route::post('register', [loginController::class, 'RegisterAction'])->name('register');