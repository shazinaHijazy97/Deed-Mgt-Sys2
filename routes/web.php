<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/admin-dashboard', [DashboardController::class, 'index']);

// Authentication
Route::post('system-login', [LoginController::class, 'systemLogin'])->name('system-login');
Route::get('singout', [LoginController::class, 'signOut'])->name('system-logout');


// Admin
Route::resource('/admin-clients', ClientController::class);
Route::get('/admin-client-register',[ ClientController::class, 'clientRegister']);