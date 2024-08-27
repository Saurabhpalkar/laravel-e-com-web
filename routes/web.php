<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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
    Route::get('admin/category/status/{id}/{status}', [CategoryController::class, 'update_status'])->name('admin.category.status');

    // routes for coupon-------------------------------------------------------
    Route::get('admin.coupon', [CouponController::class, 'index'])->name('admin.coupon');
    Route::get('admin.add_coupon', [CouponController::class, 'addCouponForm'])->name('admin.add_coupon');
    Route::post('admin.coupon.add', [CouponController::class, 'store'])->name('admin.coupon.add');
    Route::delete('/admin/coupon/delete/{id}', [CouponController::class, 'delete'])->name('admin.coupon.delete');
    Route::get('admin/coupon/edit/{id}', [CouponController::class, 'show'])->name('admin.coupon.edit');
    Route::get('admin/coupon/status/{id}/{status}', [CouponController::class, 'update_status'])->name('admin.coupon.status');

    // routes for sizes-------------------------------------------------------
    Route::get('admin.size', [SizeController::class, 'index'])->name('admin.size');
    Route::get('admin.size.addSizePage', [SizeController::class, 'addSizePage'])->name('admin.size.addSizePage');
    Route::post('admin.size.add', [SizeController::class, 'store'])->name('admin.size.add');
    Route::delete('/admin/size/delete/{id}', [SizeController::class, 'delete'])->name('admin.size.delete');
    Route::get('admin/size/edit/{id}', [SizeController::class, 'show'])->name('admin.size.edit');
    Route::get('admin/size/status/{id}/{status}', [SizeController::class, 'update_status'])->name('admin.size.status');

    // routes for sizes-------------------------------------------------------
    Route::get('admin.color', [ColorController::class, 'index'])->name('admin.color');
    Route::get('admin.color.addcolorPage', [ColorController::class, 'addcolorPage'])->name('admin.color.addcolorPage');
    Route::post('admin.color.add', [ColorController::class, 'store'])->name('admin.color.add');
    Route::delete('/admin/color/delete/{id}', [ColorController::class, 'delete'])->name('admin.color.delete');
    Route::get('admin/color/edit/{id}', [ColorController::class, 'show'])->name('admin.color.edit');
    Route::get('admin/color/status/{id}/{status}', [ColorController::class, 'update_status'])->name('admin.color.status');
    
    // product for sizes-------------------------------------------------------
    Route::get('admin.product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('admin.product.addproductPage', [ProductController::class, 'addproductPage'])->name('admin.product.addproductPage');
    Route::post('admin.product.add', [ProductController::class, 'store'])->name('admin.product.add');
    Route::delete('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    Route::get('admin/product/edit/{id}', [ProductController::class, 'show'])->name('admin.product.edit');
    Route::get('admin/product/status/{id}/{status}', [ProductController::class, 'update_status'])->name('admin.product.status');



    Route::get('admin.logout', function () {
        Session::forget('admin_id');
        Session::forget('admin_email');
        return view('admin.login');
    });
});
