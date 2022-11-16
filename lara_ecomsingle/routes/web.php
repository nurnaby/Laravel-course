<?php

use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\DashbordContorller;
use App\Http\Controllers\Admin\subcategoryController;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::controller(homeController::class)->group(function(){
    Route::get('/','index')->name('home');
});
Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}','categoryPage')->name('category');
    Route::get('/single-product','SingleProduct')->name('SingleProduct');
    Route::get('/add-to-cart','AddTocart')->name('addTocart');
    Route::get('/checkout','checkout')->name('checkout');
    Route::get('/today-deal','todayDeal')->name('todayDeal');
    Route::get('/user-profile','userProfile')->name('userProfile');
    Route::get('/new-releases','newReleases')->name('newReleases');
    Route::get('/costomer-service','costomerService')->name('costomerService');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');


Route::middleware(['auth','role:admin'])->group(function(){
    
    Route::controller(DashbordContorller::class)->group(function(){
        Route::get('/admin/dashboard','index')->name('admindashboard');
        Route::get('/admin/dashboard2','index2')->name('admindashboard2');
    });
    Route::controller(categoryController::class)->group(function(){
        Route::get('/admin/all-category','index')->name('allcategory');
        Route::get('/admin/add-category','AddCategory')->name('addcategory');
        Route::post('admin/storeCategory','storecategory')->name('storeCategory');
        Route::get('/admin/editCategory/{id}','EditeCategory')->name('editCategory');
        Route::post('admin/UpdateCategory','updateCategory')->name('UpdateCategory');
        Route::get('/admin/deleteCategory/{id}','deleteCategory')->name('deleteCategory');
    });
    Route::controller(subcategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory','index')->name('allSubcategory');
        Route::get('/admin/add-subcategory','AddSubCategory')->name('addSubcategory');
        Route::post('/admin/stor-Sub-Category','storSubCategory')->name('storSubCategory');
        Route::get('/admin/edit-subcategory/{id}','editSubCategory')->name('editSubcategry');
        Route::post('admin/Update-SubCategory','updateSubCategory')->name('UpdateSubCategory');

        Route::get('/admin/delete-subcategory/{id}','delateSubCategory')->name('deleteSubcategry');

    });

    Route::controller(productController::class)->group(function(){
        Route::get('/admin/all-product','index')->name('allProduct');
        Route::get('/admin/add-product','AddProduct')->name('addProduct');
        Route::post('/admin/stor-product','StorProduct')->name('StorProduct');
        Route::get('/admin/edit-product/{id}','EditProduct')->name('editProduct');
        Route::post('/admin/update-product','UpdateProduct')->name('UpdateProduct');
        Route::get('/admin/delete-product/{id}','deleteProduct')->name('deleteProduct');


    });
});
require __DIR__.'/auth.php';