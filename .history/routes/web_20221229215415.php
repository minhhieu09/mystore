<?php

use App\Http\Controllers\StoreController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('/store')->group(function () {
    Route::get('/',[StoreController::class,'Store']);
    Route::get('/watches',[StoreController::class,'Watches'])->name('index.watches');
    Route::get('/contact',[StoreController::class,'Contact'])->name('index.watches');
    
});