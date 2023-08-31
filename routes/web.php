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








//Admin User
Route::get('/admin/login',[App\Http\Controllers\Auth\AdminLoginController::class,'showLoginForm']);
Route::post('/admin/login',[App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.login');
Route::post('/admin/logout',[App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name('admin.logout');

//User Auth
Auth::routes();

Route::middleware('auth')->group(function(){
    //Home Page
    Route::get('/',[App\Http\Controllers\Frontend\PageController::class,'home'])->name('home');
    Route::get('/profile',[App\Http\Controllers\Frontend\PageController::class,'profile'])->name('profile');
});
