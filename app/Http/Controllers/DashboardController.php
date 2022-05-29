<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Lawyer;
use App\Models\Staff;
use App\Models\Client;
use App\Models\ClientCase;
use App\Models\DeedRequests;
use App\Models\Payment;
use DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $startMonth = Carbon::now()->startOfMonth();
        $endMonth = Carbon::now()->endOfMonth(); 
        $monthlyEarning = Payment::select('amount')->whereBetween('date',[$startMonth,$endMonth])->sum('amount');

        $startYear = Carbon::now()->startOfYear();
        $endYear = Carbon::now()->endOfYear(); 
        $annualEarning = Payment::select('amount')->whereBetween('date',[$startYear,$endYear])->sum('amount');

        $startDay = Carbon::now()->startOfDay();
        $endDay = Carbon::now()->endOfDay(); 
        $dailyAttendance = Attendance::select('id')->whereBetween('date_in',[$startDay,$endDay])->count('id');

        // dd('startMonth='.$startMonth.' endMonth='.$endMonth.' startYear='.$startYear.' endYear='.$endYear);

        $client = Client::count('id');
        $lawyer = Lawyer::count('id');
        $pendingDeeds = DeedRequests::select('id')->where('payment_status', '=' ,'Pending')->count('id');
        $pendingAppointments = Appointment::select('id')->where('appointment_status', '=' ,'Pending')->count('id');


        return view('admin.dashboard.index', compact('monthlyEarning', 'client', 'lawyer', 'annualEarning', 'pendingDeeds', 'pendingAppointments', 'dailyAttendance'));
    }

    public function clientDashboard()
    {
        return view('client.dashboard.index');
    }

    public function lawyerDashboard()
    {
        return view('lawyer.dashboard.index');
    }

}
