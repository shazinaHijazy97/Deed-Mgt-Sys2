<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Lawyer;
use App\Models\Staff;
use App\Models\Client;
use App\Models\ClientCase;
use App\Models\DeedRequests;
use App\Models\Payment;
use DB;

class ReportController extends Controller
{
    public function clientReport()
    {
        $clients = Client::select('id','nic','fname','lname')->get();
        
        return view('admin.report.clientReport', compact('clients'));
    }

    public function lawyerReport()
    {
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        
        return view('admin.report.lawyerReport', compact('lawyers'));
    }

    public function deedReport()
    {
        $clients = Client::select('id','nic','fname','lname')->get();
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        $deedRequests = DeedRequests::select('client_id', 'deed_no', 'deed_type', 'request_date', 'payment_status')->get();

        return view('admin.report.deedReport', compact('clients' , 'lawyers' , 'deedRequests'));
    }

    public function paymentReport()
    {
        $clients = Client::select('id','nic','fname','lname')->get();
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        $payments = Payment::select('client_id', 'lawyer_id', 'date', 'payment_type', 'amount')->get();
        
        return view('admin.report.paymentReport' , compact('clients' , 'lawyers' , 'payments'));
    }

    public function attendenceReport()
    {
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        $staffs = Staff::select('id','nic','fname','lname')->get();

        return view('admin.report.attendenceReport', compact('lawyers','staffs'));
    }

    public function appointmentReport()
    {
        $clients = Client::select('id','nic','fname','lname')->get();
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();

        return view('admin.report.appointmentReport', compact('clients', 'lawyers'));
    }

    public function caseReport()
    {
        $clients = Client::select('id','nic','fname','lname')->get();
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        $clientCases = ClientCase::select('client_id', 'title', 'case_type', 'lawyer_id' , 'filed_date')->get();

        
        return view('admin.report.caseReport' , compact('clients' , 'lawyers' , 'clientCases'));
    }

    public function checkAttendance(Request $request)
    {
        // dd($request);
        $nic = $request->nic;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;

        $attendances = DB::table('attendances')
                        ->join('lawyers', 'lawyers.nic', '=', 'attendances.nic')
                        // ->join('staff', 'staff.nic', '=', 'attendances.nic')
                        ->where('attendances.nic', $nic)
                        ->whereBetween('date_in', [$dateFrom, $dateTo])
                        ->get();
                        
        $count = count($attendances);
        return view('admin.report.results.attendance-report', compact('attendances', 'count', 'nic', 'dateFrom', 'dateTo'));
    }

    public function checkAppointment(Request $request)
    {
        // dd($request);
        $nic = $request->nic;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;

        $appointments = DB::table('appointments')
                        ->join('lawyers', 'lawyers.nic', '=', 'appointments.nic')
                        // ->join('staff', 'staff.nic', '=', 'attendances.nic')
                        ->where('appointments.nic', $nic)
                        ->whereBetween('date_in', [$dateFrom, $dateTo])
                        ->get();
                        
        $count = count($appointments);
        return view('admin.report.results.appointment-report', compact('appointments', 'count', 'nic', 'dateFrom', 'dateTo'));
    }
}
