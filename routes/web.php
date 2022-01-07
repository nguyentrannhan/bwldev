<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OAuthController;
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

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('CheckLogout');
Route::get('/confirm-login', [OAuthController::class, 'confirmLogin']);
Route::get('/', [MainController::class, 'index'])->name("index")->middleware('CheckLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name("logout");
