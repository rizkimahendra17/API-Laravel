<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionCotroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

// untuk tidak memunculkan menu register
Auth::routes(['register' => false]);

//ini route untuk product
Route::get('products/{id}/gallery',[ProductController::class,'gallery'])->name('products.gallery');
Route::resource('products', ProductController::class);


//ini route untuk ProductGallery
Route::resource('productgallery', ProductGalleryController::class);


//Route ini untuk transaksi
Route::get('transaction/{id}/set-status',[TransactionCotroller::class,'setStatus'])->name('transaction.status');
Route::resource('transaction',TransactionCotroller::class);
