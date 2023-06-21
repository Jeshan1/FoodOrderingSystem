<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\Socialite\GoogleController;
use App\Http\Controllers\Auth\Socialite\FacebookController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;


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

Route::get('/',[MainController::class,'main'])->name('main');
//about page
Route::get('/about',[MainController::class,'about'])->name('about');

// for authentication
Auth::routes(["verify"=>true]);
// for logout in panel side
Route::get('logout',[LoginController::class,'logout']);

// for google login routes

Route::get('/auth/google',[GoogleController::class,'redirectToGoogle'])->name('redirectToGoogle');
Route::get('/auth/google/callback',[GoogleController::class,'handleGoogleCallback']);

// for facebook login
// Route::get('auth/facebook',[FacebookController::class,'redirectToFacebook'])->name('redirectToFacebook');
// Route::get('auth/facebook/callback',[FacebookController::class,'handleFacebookCallback']);

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test_relation',[HomeController::class,'test_relation']);

//featured restaurants

Route::get('/restaurants',[MainController::class,'showRestaurants'])->name('restaurants');

Route::get('/restaurant/{id}',[MainController::class,'showRestaurantById'])->name('showrestaurant');

//job test

// Route::get('/dispatch',[MainController::class,'dispatchJob']);

Route::get('/cartitems',[MainController::class,'getActiveCartItems']);
Route::delete('/deleteCartItem/{cart_id}',[MainController::class,'deleteCartItem'])->name('cartItem.delete');
Route::post('/cart-checkout',[CartController::class,'cartCheckout'])->name('checkout.cart');

// for user detail handles

Route::get('/customerdetail',[UserDetailController::class,'addCustomerDetail'])->name('customerdetail');
Route::post('/customerdetail/storeCustomerDetail',[UserDetailController::class,'storeCustomerDetail'])->name('add.customerdetail');
Route::get('/customerdetail/edit/{id}',[UserDetailController::class,'editDetail'])->name('edit.customerdetail');
Route::put('/customerdetail/update/{id}',[UserDetailController::class,'updateDetail'])->name('update.customerdetail');
Route::delete('customerdetail/delete/{id}',[UserDetailController::class,'deleteCustomerDetail'])->name('delete.customerdetail');

// for password change

Route::get('/change-password',[PasswordChangeController::class,'changePassword'])->name('password.change');
Route::post('/update-password',[PasswordChangeController::class,'updatePassword'])->name('password.update');

// for search vendor and products
Route::get('/search',[MainController::class,'search'])->name('search');

// for contact us page
Route::get('contact',[ContactController::class,'index'])->name('contact.index');
Route::get('/contact/create',[ContactController::class,'create'])->name('contact.create');
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');
Route::get('/contact/show/{id}',[ContactController::class,'show'])->name('contact.show');
Route::delete('/contact/delete/{id}',[ContactController::class,'delete'])->name('contact.destroy');

// for not found page
Route::fallback([NotFoundController::class,'show']);





