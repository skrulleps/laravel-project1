<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// index.php nya
Route::get('/', function () {
    // return view('home');
    if (Auth::check()){
        return redirect()->route('home');
    }
    else {
        return redirect()->route('login');
    }
});

// File Salam
Route::get('/salam/{nama?}/{id}',function($nama=null,$id){
   // return('Hello world');
   if($nama == null) return "Sangkuriang";
   return "Hallooooo ".$nama;
   
});

//File Galery
Route::get('/gallery',function(){
    return('galery');
});

Route::get('/user/{name?}',function($name = null){
    return $name;
})->where ('name','[a-zA-Z]+');

Route::get('/user/{id?}/{name?}',function($id = null){
    return $id;
})->where ('id','[0-9]+',);

    //siswa 
    Route::get('/siswa',[SiswaController::class,'index']);
    Route::get('/view/{judul}',[SiswaController::class,'viewdetail']);
    Route::get('/display2/{id}/{name}/{password}',[SiswaController::class,'display2']);
    Route::get('/contactus/',[SiswaController::class,'contact']);
    Route::get('/test/',[SiswaController::class,'test']);
    Route::get('/view/{a}/{b}/{c}',[SiswaController::class,'findAkar']);
    Route::resource('siswa', SiswaController::class);
    // Produk
    Route::resource('produk', ProductController::class);
    // Category
    Route::resource('kategori', CategoryController::class);
    // Order
    Route::resource('order', OrderController::class);
    // Order Detail
    Route::resource('orderDetail', DetailOrderController::class);
    // Customer
    Route::resource('customer', CustomerController::class);
    // Invoice
    Route::group(['prefix' => 'invoice'], function() {
        Route::get('/add', [OrderController::class, 'addOrder'])->name('invoice.add');
        Route::post('/store', [OrderController::class, 'storeOrder'])->name('invoice.store');
        Route::get('/create/{id}', [OrderController::class, 'createOrder'])->name('invoice.create');
        Route::put('/update/{id}', [OrderController::class, 'updateOrder'])->name('invoice.update');
        Route::delete('/delete/{id}', [OrderController::class, 'deleteOrder'])->name('invoice.delete');
    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
