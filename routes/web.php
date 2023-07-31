<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParamController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilbuController;
use App\Http\Controllers\SetParamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataUmumController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\SetKlasterController;
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

//all
Route::get('/', [DashboardController::class, 'redirect'])->middleware('auth')->name('dashboard.redirect');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');

Route::resource('/myprofile', MyProfileController::class)->middleware('auth');

Route::resource('/profilebu', ProfilbuController::class);
Route::resource('/dataumum', DataUmumController::class)->middleware('dataumum');

//mitra
Route::resource('/parameter', ParamController::class)->middleware('checkdata');

///warga
Route::resource('/qa', QaController::class)->middleware('warga');

//admin dan superadmin
Route::resource('/setpengguna', SetPenggunaController::class)->middleware(['superadmin', 'admin']);
Route::resource('/setparam', SetParamController::class)->middleware(['superadmin', 'admin']);


Route::get('/setting/sima_klpbu', [SettingController::class, 'sima_klpbu'])->middleware(['superadmin', 'admin'])->name('set_simaklpbu');
Route::get('/dashboard/progres', [DashboardController::class, 'progress'])->middleware(['superadmin', 'admin'])->name('dashboard.progres');
Route::get('/dashboard/rincian', [DashboardController::class, 'rincian'])->middleware(['superadmin', 'admin'])->name('dashboard.rincian');
Route::get('/dashboard/show/{id}', [DashboardController::class, 'show'])->middleware(['superadmin', 'admin'])->name('dashboard.show');
