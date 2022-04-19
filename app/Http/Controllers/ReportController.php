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
        $nic = $request->nic;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;
        
        if ($nic != "0" && $dateFrom != null && $dateTo != null ) {

            $attendances = DB::table('attendances')
                        ->join('lawyers', 'lawyers.nic', '=', 'attendances.nic')
                        ->where('attendances.nic', $nic)
                        ->whereBetween('date_in', [$dateFrom, $dateTo])
                        ->get();
            $count = count($attendances);

        } else if ($nic == "0" && $dateFrom != null && $dateTo != null) {

            $attendances = DB::table('attendances')
            ->join('lawyers', 'lawyers.nic', '=', 'attendances.nic')
            ->whereBetween('date_in', [$dateFrom, $dateTo])
            ->get();
            $count = count($attendances);

        } else if ($nic != "0" && $dateFrom == null && $dateTo == null) {

            $attendances = DB::table('attendances')
            ->join('lawyers', 'lawyers.nic', '=', 'attendances.nic')
            ->where('attendances.nic', $nic)
            ->get();
            $count = count($attendances);

        } else {

            $attendances = DB::table('attendances')
            ->join('lawyers', 'lawyers.nic', '=', 'attendances.nic')
            ->get();
            $count = count($attendances);

        }
                        
        return view('admin.report.results.attendance-report', compact('attendances', 'count', 'nic', 'dateFrom', 'dateTo'));
    }

    public function checkAppointment(Request $request)
    {

        $clientId = $request->client_id;
        $lawyerId = $request->lawyer_id;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;
        $status = $request->appointment_status;

        if ($clientId != "0" && $lawyerId != "0" && $dateFrom != null && $dateTo != null && $status != "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments);

        } else if ($clientId != "0" && $lawyerId != "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get();
            $count = count($appointments);

        } else if ($clientId != "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments);

        }else if ($clientId != "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->get();
            $count = count($appointments);
    
    

        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom != null && $dateTo != null && $status != "0") {

            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments);

        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get();
            $count = count($appointments);
    

        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get();
            $count = count($appointments);    

        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status != "0") {

            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments);  
            
        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments);  
            
        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom == null && $dateTo == null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->get();
            $count = count($appointments);
    

        }   else if ($clientId == "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status != "0") {
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments); 

        } else if ($clientId == "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get();
            $count = count($appointments);

        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments);
            
        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->get();
            $count = count($appointments);
    
        }  else if ($clientId == "0" && $lawyerId == "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.appointment_status', $status)
                            ->get();
            $count = count($appointments); 
            
        } else  {
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->get();
            $count = count($appointments); 
            
        }   


        return view('admin.report.results.appointment-report', compact('appointments', 'count', 'clientId', 'lawyerId', 'dateFrom', 'dateTo', 'status'));
    }

    public function checkPaymentDetails(Request $request ){

        $clientId = $request->client_id;
        $lawyerId = $request->lawyer_id;
        $paymentType = $request->payment_type;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;


        if ($clientId != "0" && $lawyerId != "0" && $paymentType != "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                            ->join('clients', 'clients.id', '=' , 'payments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                            ->where('payments.client_id', $clientId)
                            ->where('payments.lawyer_id', $lawyerId)
                            ->where('payments.payment_type', $paymentType)
                            ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get();
            $total = $query->sum('payments.amount');



    } else if ($clientId != "0" && $lawyerId != "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.lawyer_id', $lawyerId)
                        ->where('payments.payment_type', $paymentType);
                        

        $payments = $query->get();
        $total = $query->sum('payments.amount');
    
    } else if ($clientId != "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.lawyer_id', $lawyerId)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId != "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom == null && $dateTo == null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.lawyer_id', $lawyerId);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId != "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom != null && $dateTo != null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.payment_type', $paymentType)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId != "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.payment_type', $paymentType); 

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId != "0" && $lawyerId == "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId != "0" && $lawyerId == "0" && $paymentType == "0" && $dateFrom == null && $dateTo == null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId == "0" && $lawyerId != "0" && $paymentType != "0" && $dateFrom != null && $dateTo != null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId)
                        ->where('payments.payment_type', $paymentType)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId == "0" && $lawyerId != "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId)
                        ->where('payments.payment_type', $paymentType);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId == "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId == "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom == null && $dateTo == null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId); 

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId == "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom != null && $dateTo != null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.payment_type', $paymentType)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId == "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.payment_type', $paymentType);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else if ($clientId == "0" && $lawyerId == "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    } else {
            
        $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id');

        $payments = $query->get();
        $total = $query->sum('payments.amount');

    }

    return view('admin.report.results.payment-report', compact('payments', 'total', 'clientId', 'lawyerId', 'paymentType', 'dateFrom', 'dateTo'));


}}
