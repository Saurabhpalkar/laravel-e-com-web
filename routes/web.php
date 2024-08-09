<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',[AdminController::class,'index']);
Route::post('admin.auth',[AdminController::class,'auth'])->name('admin.auth');
Route::get('admin.dashboard',[AdminController::class,'dashboard'])->name('admin/dashboard');
