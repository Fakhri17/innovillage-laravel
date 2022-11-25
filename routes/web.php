<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
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

Route::get('/', [IndexController::class, 'index']);

Route::get('/login',[LoginController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/setting', [SettingController::class, 'index'])->middleware('auth');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/dashboard/setting/update', [SettingController::class, 'updatePonic']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
