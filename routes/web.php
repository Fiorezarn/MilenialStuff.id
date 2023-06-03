<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Order;
use App\Http\Livewire\product_livewire;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Bayar;
use App\Http\Livewire\Index;

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
Route::get('/about', function () {
    return view('about');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/register', function () {
    return view('register');  
});
///////////////////////////////////////////////////////////////////
Auth::routes();
Route::get('/', \App\Http\Livewire\Index::class)->name('home');
//////////////////////////////////////////////////////////////////
Route::get('/viewprofile', [App\Http\Controllers\UserController::class, 'show'])->middleware('Auth')->name('show_profile');
Route::get('/editprofile', [App\Http\Controllers\UserController::class, 'edit_page'])->middleware('Auth')->name('edit_profile');
Route::post('/editprofile', [App\Http\Controllers\UserController::class, 'update_profile'])->middleware('Auth')->name('update_profile');
///////////////////////////////////////////////////////////////////

//tidak bisa mengakses dashboard jika belum login
Route::group(['middleware' => ['Auth', 'Admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/delete/{id}', [DashboardController::class, 'delete']);
});

//Hak Akses Admin
Route::group(['middleware' => 'Admin'], function () {
    //Sneakers
    Route::get('/dataitem',[ItemController::class,'index'])->name('dataitem');
    Route::get('/dataitem/detailitem/{id}',[ItemController::class,'detail']);
    Route::get('/dataitem/add',[ItemController::class,'add']);
    Route::post('/dataitem/insert',[ItemController::class,'insert']);
    Route::get('/dataitem/edit/{id}',[ItemController::class,'edit']);
    Route::post('/dataitem/update/{id}',[ItemController::class,'update']);
    Route::get('/dataitem/delete/{id}',[ItemController::class,'delete']);
    //Trending
    Route::get('/datatrending',[ItemController::class,'trending'])->name('datatrending');
    Route::get('/datatrending/detailtrending/{id}',[ItemController::class,'detailtrending']);
    Route::get('/datatrending/addtrending',[ItemController::class,'addtrending']);
    Route::post('/datatrending/inserttrending',[ItemController::class,'inserttrending']);
    Route::get('/datatrending/edittrending/{id}',[ItemController::class,'edittrending']);
    Route::post('/datatrending/updatetrending/{id}',[ItemController::class,'updatetrending']);
    Route::get('/datatrending/deletetrending/{id}',[ItemController::class,'deletetrending']);
    //Apparel
    Route::get('/dataapparel',[ItemController::class,'apparel'])->name('dataapparel');
    Route::get('/dataapparel/detailapparel/{id}',[ItemController::class,'detailapparel']);
    Route::get('/dataapparel/addapparel',[ItemController::class,'addapparel']);
    Route::post('/dataapparel/insertapparel',[ItemController::class,'insertapparel']);
    Route::get('/dataapparel/editapparel/{id}',[ItemController::class,'editapparel']);
    Route::post('/dataapparel/updateapparel/{id}',[ItemController::class,'updateapparel']);
    Route::get('/dataapparel/deleteapparel/{id}',[ItemController::class,'deleteapparel']);
    //Special Offer 1
    Route::get('/dataspecial1',[ItemController::class,'special1'])->name('dataspecial1');
    Route::get('/dataspecial1/detailspecial1/{id}',[ItemController::class,'detailspecial1']);
    Route::get('/dataspecial1/addspecial1',[ItemController::class,'addspecial1']);
    Route::post('/dataspecial1/insertspecial1',[ItemController::class,'insertspecial1']);
    Route::get('/dataspecial1/editspecial1/{id}',[ItemController::class,'editspecial1']);
    Route::post('/dataspecial1/updatespecial1/{id}',[ItemController::class,'updatespecial1']);
    Route::get('/dataspecial1/deletespecial1/{id}',[ItemController::class,'deletespecial1']);
    //Special Offer 2
    Route::get('/dataspecial2',[ItemController::class,'special2'])->name('dataspecial2');
    Route::get('/dataspecial2/detailspecial2/{id}',[ItemController::class,'detailspecial2']);
    Route::get('/dataspecial2/addspecial2',[ItemController::class,'addspecial2']);
    Route::post('/dataspecial2/insertspecial2',[ItemController::class,'insertspecial2']);
    Route::get('/dataspecial2/editspecial2/{id}',[ItemController::class,'editspecial2']);
    Route::post('/dataspecial2/updatespecial2/{id}',[ItemController::class,'updatespecial2l']);
    Route::get('/dataspecial2/deletespecial2/{id}',[ItemController::class,'deletespecial2']);
});


//Keranjang
Route::get('/cart', \App\Http\Livewire\Cart::class);
Route::get('/product', \App\Http\Livewire\Product::class);
Route::get('/TambahOngkir/{id}', \App\Http\Livewire\TambahOngkir::class);
Route::get('/alamat/{id}', \App\Http\Livewire\Alamat::class);

//Payment
Route::get('/Bayar/{id}', \App\Http\Livewire\Bayar::class)->name('Bayar');


//user
// Route::get('/user',[UserController::class, 'index'])->middleware('User')->name('user');

//admin
// Route::get('/admin', [AdminController::class, 'index'])->middleware('Admin')->name('admin');

