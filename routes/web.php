<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilbuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\SetPenggunaController;

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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.post');


Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::resource('/myprofile', MyProfileController::class)->middleware('auth');

Route::resource('/profilebu', ProfilbuController::class)->middleware('auth');

Route::resource('/setpengguna', SetPenggunaController::class)->middleware('auth');
// Route::resource('/setklaster', SetKlasterController::class)->middleware('auth');
