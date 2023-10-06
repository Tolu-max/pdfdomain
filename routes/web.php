<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Paymentroutes;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('products', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


Route::get('products/lamladmaths', [HomeController::class, 'lamladmaths'])->name('lamladmaths');


//Payment of textbooks
Route::post('/pay-lamlad', [App\Http\Controllers\PaymentController::class, 'paylamladmaths'])->name('paylamlad');
Route::get('payment/paylamladmaths', [Paymentroutes::class, 'paylamladmaths'])->name('paylamladmaths');

// routes/web.php
Route::get('/download-lamladmaths', [DownloadController::class, 'downloadPDF'])->name('download-lamladmaths');



require __DIR__.'/auth.php';
