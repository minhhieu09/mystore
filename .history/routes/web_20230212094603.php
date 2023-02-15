<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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
//     return view('welcome');
// });


Route::prefix('/store')->group(function () {
    Route::get('/',[StoreController::class,'Store']);
    Route::get('/watches',[StoreController::class,'Watches'])->name('index.watches');
    Route::get('/contact',[StoreController::class,'Contact'])->name('index.contact');
    Route::get('/about',[StoreController::class,'About'])->name('index.about');
    
});

Route::prefix('cart')->group(function () {
    Route::get('cart',[CartController::class,'Cart'])->name('index.cart');
    Route::get('detail/{id}',[StoreController::class,'Detail'])->name('index.detail');

    Route::get('add-cart',[StoreController::class,'addcart'])->name('index.add');
    Route::get('get-memory',[StoreController::class,'getmemory'])->name('get-memory');
});

Route::prefix('admin')->group(function() {
    Route::get('/',[AdminController::class,'dashboard'])->name('index.dashboard');
});


Route::get('admin/login',function() {
    return view('admin.login');
});
Route::post('admin/login',)