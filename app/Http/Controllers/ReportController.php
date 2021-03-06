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
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);

            $count = count($appointments);

        } else if ($clientId != "0" && $lawyerId != "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);

        } else if ($clientId != "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->where('appointments.appointment_status', $status)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
            $count = count($appointments);

        }else if ($clientId != "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);
    
    

        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom != null && $dateTo != null && $status != "0") {

            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->where('appointments.appointment_status', $status)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);

        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);
    

        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);    

        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status != "0") {

            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->where('appointments.appointment_status', $status)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);  
            
        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->where('appointments.appointment_status', $status)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);  
            
        } else if ($clientId != "0" && $lawyerId == "0" && $dateFrom == null && $dateTo == null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.client_id', $clientId)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);
    

        }   else if ($clientId == "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status != "0") {
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->where('appointments.appointment_status', $status)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments); 

        } else if ($clientId == "0" && $lawyerId == "0" && $dateFrom != null && $dateTo != null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->whereBetween('appointments.date', [$dateFrom, $dateTo])
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);

        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->where('appointments.appointment_status', $status)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);
            
        } else if ($clientId == "0" && $lawyerId != "0" && $dateFrom == null && $dateTo == null && $status == "0") {
            
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.lawyer_id', $lawyerId)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
            $count = count($appointments);
    
        }  else if ($clientId == "0" && $lawyerId == "0" && $dateFrom == null && $dateTo == null && $status != "0") {
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->where('appointments.appointment_status', $status)
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
            $count = count($appointments); 
            
        } else  {
            $appointments = DB::table('appointments')
                            ->join('clients', 'clients.id', '=' , 'appointments.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'appointments.lawyer_id')
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'appointments.date', 'appointments.time', 'appointments.appointment_status', 'appointments.note']);
                            
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

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');



        } else if ($clientId != "0" && $lawyerId != "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.lawyer_id', $lawyerId)
                        ->where('payments.payment_type', $paymentType);
                        

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');
    
        } else if ($clientId != "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.lawyer_id', $lawyerId)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId != "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom == null && $dateTo == null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.lawyer_id', $lawyerId);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId != "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.payment_type', $paymentType)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId != "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->where('payments.payment_type', $paymentType); 

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId != "0" && $lawyerId == "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId != "0" && $lawyerId == "0" && $paymentType == "0" && $dateFrom == null && $dateTo == null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.client_id', $clientId);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId == "0" && $lawyerId != "0" && $paymentType != "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId)
                        ->where('payments.payment_type', $paymentType)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId == "0" && $lawyerId != "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId)
                        ->where('payments.payment_type', $paymentType);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId == "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId == "0" && $lawyerId != "0" && $paymentType == "0" && $dateFrom == null && $dateTo == null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.lawyer_id', $lawyerId); 

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId == "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.payment_type', $paymentType)
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId == "0" && $lawyerId == "0" && $paymentType != "0" && $dateFrom == null && $dateTo == null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->where('payments.payment_type', $paymentType);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else if ($clientId == "0" && $lawyerId == "0" && $paymentType == "0" && $dateFrom != null && $dateTo != null ) {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id')
                        ->whereBetween('payments.date', [$dateFrom, $dateTo]);

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        } else {
            
            $query = DB::table('payments')
                        ->join('clients', 'clients.id', '=' , 'payments.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'payments.lawyer_id');

            $payments = $query->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'payments.date', 'payments.payment_type', 'payments.amount']);
            $total = $query->sum('payments.amount');

        }

        return view('admin.report.results.payment-report', compact('payments', 'total', 'clientId', 'lawyerId', 'paymentType', 'dateFrom', 'dateTo'));

    }

    public function checkCaseDetails(Request $request){

        $clientId = $request->client_id;
        $caseType = $request->case_type;
        $lawyerId = $request->lawyer_id;
        $filedDate = $request->filed_date;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;

        if ($clientId != "0" &&  $caseType != "0" && $lawyerId != "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
            $clientCases = DB::table('cases')
                            ->join('clients', 'clients.id', '=' , 'cases.client_id')
                            ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                            ->where('cases.client_id', $clientId)
                            ->where('cases.case_type', $caseType)
                            ->where('cases.lawyer_id', $lawyerId)
                            ->where('cases.filed_date', $filedDate)
                            ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);

                            
            $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType != "0" && $lawyerId != "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.case_type', $caseType)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);


        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType != "0" && $lawyerId != "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.case_type', $caseType)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType != "0" && $lawyerId != "0" && $filedDate == null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.case_type', $caseType)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.case_type', $caseType)
                        ->where('cases.filed_date', $filedDate)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.case_type', $caseType)
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.case_type', $caseType)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate == null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.case_type', $caseType)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->where('cases.filed_date', $filedDate)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate == null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId == "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.filed_date', $filedDate)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId == "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId == "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId != "0" &&  $caseType == "0" && $lawyerId == "0" && $filedDate == null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.client_id', $clientId)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType != "0" && $lawyerId != "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.case_type', $caseType)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->where('cases.filed_date', $filedDate)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType != "0" && $lawyerId != "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.case_type', $caseType)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType != "0" && $lawyerId != "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.case_type', $caseType)
                        ->where('cases.lawyer_id', $lawyerId)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.case_type', $caseType)
                        ->where('cases.filed_date', $filedDate)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.case_type', $caseType)
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.case_type', $caseType)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType != "0" && $lawyerId == "0" && $filedDate == null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.case_type', $caseType)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.lawyer_id', $lawyerId)
                        ->where('cases.filed_date', $filedDate)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.lawyer_id', $lawyerId)
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.lawyer_id', $lawyerId)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType == "0" && $lawyerId != "0" && $filedDate == null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.lawyer_id', $lawyerId)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType == "0" && $lawyerId == "0" && $filedDate != null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.filed_date', $filedDate)
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType == "0" && $lawyerId == "0" && $filedDate != null && $dateFrom == null && $dateTo == null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->where('cases.filed_date', $filedDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);
                        
        $count = count($clientCases);

    } else if ($clientId == "0" &&  $caseType == "0" && $lawyerId == "0" && $filedDate == null && $dateFrom != null && $dateTo != null) {
            
        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->whereBetween('cases.filed_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);        
        $count = count($clientCases);

    } else {

        $clientCases = DB::table('cases')
                        ->join('clients', 'clients.id', '=' , 'cases.client_id')
                        ->join('lawyers', 'lawyers.id', '=' , 'cases.lawyer_id')
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname','lawyers.fname AS lawyerFname','lawyers.lname AS lawyerLname', 'cases.title', 'cases.case_type', 'cases.filed_date']);

        $count = count($clientCases);

    }

    return view('admin.report.results.case-report', compact('clientCases', 'count', 'clientId', 'caseType' , 'lawyerId', 'filedDate' , 'dateFrom', 'dateTo'));

    }

    public function checkDeedDetails(Request $request){

        $clientId = $request->client_id;
        $deedType = $request->deed_type;
        $requestDate = $request->request_date;
        $paymentStatus = $request->payment_status;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;

        if ($clientId != "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
            $deedRequests = DB::table('deed_requests')
                            ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                            ->where('deed_requests.client_id', $clientId)
                            ->where('deed_requests.deed_type', $deedType)
                            ->where('deed_requests.request_date', $requestDate)
                            ->where('deed_requests.payment_status', $paymentStatus)
                            ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

            $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.request_date', $requestDate)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);
                        
        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
            $deedRequests = DB::table('deed_requests')
                            ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                            ->where('deed_requests.client_id', $clientId)
                            ->where('deed_requests.deed_type', $deedType)
                            ->where('deed_requests.request_date', $requestDate)
                            ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                            ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

            $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.request_date', $requestDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.deed_type', $deedType)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus == "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.deed_type', $deedType)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.request_date', $requestDate)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.request_date', $requestDate)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.request_date', $requestDate)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.request_date', $requestDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate == null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId != "0" &&  $deedType == "0" && $requestDate == null && $paymentStatus == "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.client_id', $clientId)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.request_date', $requestDate)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.request_date', $requestDate)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.request_date', $requestDate)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.request_date', $requestDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType != "0" && $requestDate == null && $paymentStatus == "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.deed_type', $deedType)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.request_date', $requestDate)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.request_date', $requestDate)
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.request_date', $requestDate)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType == "0" && $requestDate != null && $paymentStatus == "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.request_date', $requestDate)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType == "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType == "0" && $requestDate == null && $paymentStatus != "0" && $dateFrom == null && $dateTo == null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->where('deed_requests.payment_status', $paymentStatus)
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else if ($clientId == "0" &&  $deedType == "0" && $requestDate == null && $paymentStatus == "0" && $dateFrom != null && $dateTo != null) {
            
        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->whereBetween('deed_requests.request_date', [$dateFrom, $dateTo])
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);

    } else {

        $deedRequests = DB::table('deed_requests')
                        ->join('clients', 'clients.id', '=' , 'deed_requests.client_id')
                        ->get(['clients.fname AS clientFname','clients.lname AS clientLname', 'deed_requests.deed_no', 'deed_requests.deed_type', 'deed_requests.request_date', 'deed_requests.payment_status']);

        $count = count($deedRequests);
    }

    return view('admin.report.results.deed-report', compact('deedRequests', 'count', 'clientId' , 'deedType', 'requestDate' , 'paymentStatus' , 'dateFrom', 'dateTo'));
    }
    
    public function checkClientDetails(Request $request){
        
        $nic = $request->nic;

        if ($nic != "0"){

            $clients = DB::table('clients')
                        ->where('clients.nic', $nic)
                        ->get();

            $count = count($clients);

        } else {

            $clients = DB::table('clients')
            ->get();

            $count = count($clients);
        }

        return view('admin.report.results.client-report' , compact('clients' , 'count' , 'nic'));
    }

    public function checkLawyerDetails(Request $request){
        
        $nic = $request->nic;

        if ($nic != "0"){

            $lawyers = DB::table('lawyers')
                        ->where('lawyers.nic', $nic)
                        ->get();

            $count = count($lawyers);

        } else {

            $lawyers = DB::table('lawyers')
            ->get();

            $count = count($lawyers);
        }

        return view('admin.report.results.lawyer-report' , compact('lawyers' , 'count' , 'nic'));
    }
}