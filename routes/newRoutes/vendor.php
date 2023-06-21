<?php

use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Vendor\DashboardController as DashboardController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\OrderController;
Use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordChangeController;

Route::group(['middleware'=>['vendor-auth','verified'],'prefix'=>'vendor'],function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('vendor.dashboard');

    //profile setting
    Route::get('/profile',[ProfileController::class,'profile'])->name('vendor.profile');
    //edit vendor data
    Route::get('/editvendor/{id}',[ProfileController::class,'editVendorData'])->name('vendor.edit');
    Route::put('/updatevendor/{id}',[ProfileController::class,'updateVendor'])->name('vendor.update');
    Route::get('/viewvendor',[ProfileController::class,'viewvendor'])->name('vendor.view');

    //crud product
    Route::resource('product',ProductController::class);

    //add user details
    Route::get('/userdetail',[UserDetailController::class,'index'])->name('vendor.userdetail.index');
    Route::get('/userdetail/create',[UserDetailController::class,'create'])->name('vendor.userdetail.create');
    Route::post('/userdetail/store',[UserDetailController::class,'store'])->name('vendor.userdetail.store');
    Route::get('/userdetail/edit/{id}',[UserDetailController::class,'edit'])->name('vendor.userdetail.edit');
    Route::put('/userdetail/update/{id}',[UserDetailController::class,'update'])->name('vendor.userdetail.update');
    Route::delete('/userdetail/delete/{id}',[UserDetailController::class,'delete'])->name('vendor.userdetail.delete');

    // for cart show in vendor
    Route::get('/order',[OrderController::class,'getOrders'])->name('vendor.orders');

    // for password change
    Route::get('/change-password',[PasswordChangeController::class,'ChangePasswords'])->name('vendor.password.change');
    Route::post('/update-password',[PasswordChangeController::class,'UpdatePasswords'])->name('vendor.password.update');
});








?>