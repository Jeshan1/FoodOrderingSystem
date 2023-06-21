<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(["middleware"=>"auth:api"],function(){
    Route::get("add-to-cart/{product_id}",[CartController::class,'addToCart']);
    // for admin
    Route::get('admin/pendingorderitem/{cartId}',[OrderController::class,'getAdiminPendingItem']);

    // for vendor
    Route::get('vendor/orderitem/{cartId}',[OrderController::class,'getVendorOrderItem']);


});
