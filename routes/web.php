<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/admin',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('/admin/formCreate',[AdminController::class,'formCreate'])->name('admin.formCreate');
Route::post('/admin/formSave',[AdminController::class,'formSave'])->name('admin.formSave');
Route::get('/admin/formResponse/{id}',[AdminController::class,'formResponse'])->name('admin.formResponse');
Route::post('/admin/formStatus',[AdminController::class,'formStatus'])->name('admin.formStatus');

Route::get('/user',[UserController::class,'index'])->name('user.dashboard');
Route::get('/user/formFill/{id}',[UserController::class,'formFill'])->name('user.formFill');
Route::post('/user/formSubmit',[UserController::class,'formSubmit'])->name('user.formSubmit');