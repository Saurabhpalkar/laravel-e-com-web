<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin.auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::middleware([AdminAuth::class])->group(function () {

    Route::get('admin.dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // routes for category-------------------------------------------------------
    Route::get('admin.category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('admin.manage_category', [CategoryController::class, 'manage_category'])->name('admin.manage_category');
    Route::post('admin.manage_category_proccess', [CategoryController::class, 'add'])->name('admin.manage_category_proccess');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'manage_category'])->name('admin.category.edit');

    // routes for coupon-------------------------------------------------------
    Route::get('admin.coupon', [CouponController::class, 'index'])->name('admin.coupon');
    Route::get('admin.add_coupon', [CouponController::class, 'addCouponForm'])->name('admin.add_coupon');
    Route::post('admin.manage_coupon_proccess', [CouponController::class, 'add'])->name('admin.manage_coupon_proccess');
    Route::delete('/admin/coupon/delete/{id}', [CouponController::class, 'delete'])->name('admin.coupon.delete');
    Route::get('admin/coupon/edit/{id}', [CouponController::class, 'manage_coupon'])->name('admin.coupon.edit');
    
    Route::get('admin.logout', function () {
        Session::forget('admin_id');
        Session::forget('admin_email');
        return view('admin.login');
    });
});
