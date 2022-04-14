<?php

use App\Http\Controllers\API\CheckoutController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//nantik route ini yang kita pakai untuk link postman

Route::get('product',[ProductController::class,'all']);
/*kita pakai post karna kita mengirim kan data*/ 
Route::post('checkout',[CheckoutController::class,'checkout']);
Route::get('transaction/{id}',[TransactionController::class,'get']);
