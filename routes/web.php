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
use App\Http\Controllers\ClientCaseController;
use App\Http\Controllers\ClientPortalController;
use App\Http\Controllers\LawyerPortalController;



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
Route::get('about-us', [HomeController::class, 'aboutUs']);
Route::get('services', [HomeController::class, 'services']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('forgot-password', [HomeController::class, 'forgotPassword']);
Route::get('client-register', [HomeController::class, 'clientRegister']);

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
Route::get('admin-clientReport', [ReportController::class, 'clientReport']);
Route::get('admin-lawyerReport', [ReportController::class, 'lawyerReport']);
Route::get('admin-deedReport', [ReportController::class, 'deedReport']);
Route::get('admin-paymentReport', [ReportController::class, 'paymentReport']);
Route::get('admin-attendenceReport', [ReportController::class, 'attendenceReport']);
Route::get('admin-appointmentReport', [ReportController::class, 'appointmentReport']);
Route::get('admin-caseReport', [ReportController::class, 'caseReport']);

Route::post('post-attendance-report', [ReportController::class, 'checkAttendance']);
Route::post('post-appointment-report', [ReportController::class, 'checkAppointment']);
Route::post('post-client-report', [ReportController::class, 'checkclientDetails']);
Route::post('post-lawyer-report', [ReportController::class, 'checkLawyerDetails']);
Route::post('post-deed-report', [ReportController::class, 'checkDeedDetails']);
Route::post('post-payment-report', [ReportController::class, 'checkPaymentDetails']);
Route::post('post-case-report', [ReportController::class, 'checkCaseDetails']);

//Admin-Cases
Route::resource('admin-client-case', ClientCaseController::class);


//Client Module
Route::get('/client-dashboard', [DashboardController::class, 'clientDashboard']);

Route::get('/client-clients', [ ClientPortalController::class, 'client']);
Route::post('/client-client-register/{request}',[ ClientPortalController::class, 'clientRegister']);
Route::get('/client-lawyers', [ ClientPortalController::class, 'lawyerDetails']);
Route::get('/client-deed-requests', [ ClientPortalController::class, 'deedRequests']);
Route::get('/client-deed-deedRequests',[ ClientPortalController::class, 'postDeedRequest']);
Route::post('/client-deed-requests-post/{request}',[ ClientPortalController::class, 'deedStore']);
Route::get('/client-appointment', [ ClientPortalController::class, 'makeAppointment']);
Route::post('/client-appointment/{request}', [ ClientPortalController::class, 'appointmentStore']);
Route::get('/client-appointment-view', [ ClientPortalController::class, 'viewAppointment']);
Route::get('/client-payment', [ ClientPortalController::class, 'payments']);
Route::get('/client-notification', [ ClientPortalController::class, 'notifications']);
Route::get('/client-client-case', [ ClientPortalController::class, 'cases']);
Route::get('/client-client-case-view', [ ClientPortalController::class, 'casesView']);
Route::post('/client-client-case/{request}', [ ClientPortalController::class, 'caseStore']);

//Lawyer Module
Route::get('/lawyer-dashboard', [DashboardController::class, 'lawyerDashboard']);

Route::get('/lawyer-lawyers', [ LawyerPortalController::class, 'lawyer']);
Route::get('/lawyer-deed-requests', [ LawyerPortalController::class, 'deedRequests']);
Route::get('/lawyer-appointment-view', [ LawyerPortalController::class, 'viewAppointment']);
Route::get('/lawyer-payment', [ LawyerPortalController::class, 'payments']);
Route::get('/lawyer-notification', [ LawyerPortalController::class, 'notifications']);
Route::get('/lawyer-lawyer-case-view', [ LawyerPortalController::class, 'casesView']);
