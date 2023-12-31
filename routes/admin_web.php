<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->name('admin.')->middleware('auth:admin_users')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\PageController::class,'home'])->name('home');
    Route::resource('/admin-user',App\Http\Controllers\Backend\AdminUserController::class);
    Route::resource('/users',App\Http\Controllers\Backend\UserController::class);
    Route::get('/admin-user/datatable',[App\Http\Controllers\Backend\AdminUserController::class,'ssd']); 
    Route::get('/wallet',[App\Http\Controllers\Backend\WalletController::class,'index'])->name('wallet.index');
});


