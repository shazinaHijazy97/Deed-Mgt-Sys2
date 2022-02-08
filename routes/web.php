<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DeedRequestsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReportController;



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


// Admin-Client
Route::resource('admin-clients', ClientController::class);
Route::get('/admin-client-register',[ ClientController::class, 'clientRegister']);

// Admin-Lawyer
Route::resource('admin-lawyers', LawyerController::class);
Route::get('/admin-lawyer-register',[ LawyerController::class, 'lawyerRegister']);

// Admin-Staff
Route::resource('admin-staff', StaffController::class);
Route::get('/admin-staff-register',[ StaffController::class, 'staffRegister']);

// Admin-Deed Requests
Route::resource('admin-deed-requests', DeedRequestsController::class);
Route::get('/admin-deed-deedRequests',[ DeedRequestsController::class, 'deedRequests']);

// Admin-Attendance
Route::resource('admin-attendance', AttendanceController::class);

// Admin-Appointments
Route::resource('admin-appointment', AppointmentController::class);

// Admin-Payments
Route::resource('admin-payment', PaymentController::class);

//Admin-Notification
Route::resource('admin-notification', NotificationController::class);

//Admin-Inventory
Route::resource('admin-inventory', InventoryController::class);

//Admin-Report
Route::get('admin-report', [ReportController::class, 'index']);
