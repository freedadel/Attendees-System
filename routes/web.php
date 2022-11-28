<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [AdminController::class,'index']);
Route::get('/home', [AdminController::class,'index'])->name('home');
Route::get('/registration', [HomeController::class,'registration'])->name('registration');
Route::post('/userStore', [HomeController::class,'userStore'])->name('userStore');
Route::get('/checkin', [UsersController::class,'checkin'])->name('users.checkin');
Route::get('/checkout', [UsersController::class,'checkout'])->name('users.checkout');
Route::get('/records', [UsersController::class,'records'])->name('users.records');
Auth::routes();


Route::resource('/users', App\Http\Controllers\UsersController::class);
