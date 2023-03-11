<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::prefix('/store')->group(function () {
    Route::get('/', [StoreController::class, 'Store'])->name('index.store');
    Route::get('/watches', [StoreController::class, 'Watches'])->name('index.watches');
    Route::get('/contact', [StoreController::class, 'Contact'])->name('index.contact');
    Route::get('/about', [StoreController::class, 'About'])->name('index.about');
});

Route::prefix('cart')->group(function () {
    Route::get('', [StoreController::class, 'cart'])->name('index.cart');
    Route::get('cart-session',[StoreController::class,'getCartSession']);
    Route::get('detail/{id}', [StoreController::class, 'Detail'])->name('index.detail');
    Route::get('add-cart', [StoreController::class, 'addcart'])->name('index.add');
    Route::get('get-memory', [StoreController::class, 'getmemory'])->name('get-memory');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('index.dashboard');
    Route::get('/listing',[ListingController::class, 'index'])->name('listing.index');
    Route::get('/listing/Admin',[AdminController::class, 'admin'])->name('listing.admin');
    Route::get('/create',[AdminController::class,'create'])->name('editing.create');
    Route::get('/{id}',[AdminController::class, 'edit'])->name('admin.edit');
    Route::get('{id}/delete',[AdminController::class, 'delete'])->name('admin.delete');
    Route::post('',[AdminController::class, 'store'])->name('admin.store');

    //CRUD product type
    Route::prefix('type')->group(function(){
        Route::get('index',[ProductTypeController::class,'index'])->name('admin.producttype');
        Route::get('create',[ProductTypeController::class,'create'])->name('admin.create');
    });
});
Route::get('login', function () {
    
    return view('admin.login');
})->;
Route::post('login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('logout', [AdminController::class, 'loginout'])->name('admin.loginout');
