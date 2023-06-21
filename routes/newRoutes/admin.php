<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['admin-auth','verified'],'prefix'=>'admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('slider', SliderController::class);
    Route::resource('size',SizeController::class);

    //pending vendors
    Route::get('/pendingvendors',[VendorController::class,'pendingvendor'])->name('pendingvendor.index');
    Route::get('/approvevendors/{id}',[VendorController::class,'approvevendor'])->name('approvevendor.index');
    Route::get('/rejectvendors/{id}',[VendorController::class,'rejectvendor'])->name('rejectvendor.index');


    //approved vendors
    Route::get('/approvedvendors',[VendorController::class,'approvedvendors'])->name('approvedvendors.index');
    //delete approved vendors
    Route::delete('/deleteapprovedvendor/{id}',[VendorController::class,'deleteapprovedvendor'])->name('approvedvendor.destroy'); 
    //status active and inactive
    Route::get('/checkstatusvendor/{id}',[VendorController::class,'checkstatusvendor'])->name('checkstatusvendor');

    //profile setting
    Route::get('/profile',[ProfileController::class,'profile'])->name('admin.profile');

    //add user details
    Route::get('/userdetail',[UserDetailController::class,'adminIndex'])->name('admin.userdetail.index');
    Route::get('/userdetail/create',[UserDetailController::class,'adminCreate'])->name('admin.userdetail.create');
    Route::post('/userdetail/store',[UserDetailController::class,'adminStore'])->name('admin.userdetail.store');
    Route::get('/userdetail/edit/{id}',[UserDetailController::class,'adminEdit'])->name('admin.userdetail.edit');
    Route::put('/userdetail/update/{id}',[UserDetailController::class,'adminUpdate'])->name('admin.userdetail.update');
    Route::delete('/userdetail/delete/{id}',[UserDetailController::class,'adminDelete'])->name('admin.userdetail.delete');

    // for order handle
    Route::get('/pendingorder',[OrderController::class,'getAdminPendingOrder'])->name('order.pending');
    Route::post('/pendingorder/update-status',[OrderController::class,'updateOrderStatus'])->name('updateStatus');
    Route::get('/approvedorder',[OrderController::class,'getApproveCart'])->name('order.approve');
    // delete approved vendor
    Route::delete('/approvedorder/delete/{cartId}',[OrderController::class,'destroyApprovedOrder'])->name('approve.order.destroy');

    // for password change
    
    Route::get('/change-password',[PasswordChangeController::class,'ChangePasswords'])->name('admin.password.change');
    Route::post('/update-password',[PasswordChangeController::class,'updatePasswords'])->name('admin.password.update');
});



?>