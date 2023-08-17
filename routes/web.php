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



//User Auth
Auth::routes();

//Home Page
Route::get('/',[App\Http\Controllers\Frontend\PageController::class,'home']);

//Admin User
Route::get('/admin/login',[App\Http\Controllers\Auth\AdminLoginController::class,'showLoginForm']);
Route::post('/admin/login',[App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.login');
