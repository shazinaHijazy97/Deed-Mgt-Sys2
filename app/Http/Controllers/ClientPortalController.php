<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\DeedRequests;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Notification;
use App\Models\ClientCase;

class ClientPortalController extends Controller
{
    public function client() {
        $client = Client::find(Auth::guard('client')->id());
        return view('client.client.index',compact('client'));
        
    }

    public function clientRegister(Request $request)
    {

        $array = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'nic' => $request->nic,
            'contact' => $request->contact,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        Client::create($array);
        // return redirect()->intended('/')->with('success', 'Client created successfully');
        echo "<script>";
        echo "alert('Registered Successfully. Please Login!');";
        echo "window.history.go(-2);";
        echo "</script>";

    }

    public function lawyerDetails() {

        $lawyers = Lawyer::all();
        return view('client.lawyer.index', compact('lawyers'));

    }

    public function deedRequests() {
        $deedRequests = DeedRequests::where("client_id", "=",Auth::guard('client')->id())->get();
        return view('client.deed.index', compact('deedRequests'));
    }

    public function postDeedRequest() {
        return view('client.deed.deedRequests');
    }

    public function deedStore(Request $request)
    {
        $request->validate([
            'deed_no' =>'required',
            'deed_type' =>'required',
            'request_date' =>'required',
        ]);

        DeedRequests::create($request->all());

        return redirect()->intended('client-deed-requests');
        
    }

    public function makeAppointment() {
        $lawyers = Lawyer::select('id','nic','fname','lname','practicing_area')->get();
    
        return view('client.appointment.makeAppointment',compact('lawyers'));
    }

    public function appointmentStore(Request $request)
    {
        $lawyer = $request->lawyer_id;
        $date = $request->date;
        $time = $request->time;

        $availability = Appointment::where("lawyer_id", "=", $lawyer)
        ->where("date", "=", $date)
        ->where("time", "=", $time) 
        ->get();

        if ($availability == '[]') {
            // dd("Time slot is available ".$availability);
            Appointment::create($request->all());
            return redirect()->intended('client-appointment-view')->with('success', 'Appointment Made successfully');

        } else {
            // dd("time slot is not available ".$availability);.
            echo "<script>";
            echo "alert('Appointment Time Slot Is Not Available!');";
            echo "window.history.back();";
            echo "</script>";

        }
    
    }

    public function viewAppointment() {
        $appointments = Appointment::where("client_id", "=",Auth::guard('client')->id())->get();
        return view('client.appointment.index', compact('appointments'));
    }

    public function payments() {
        $payments = Payment::where("client_id", "=",Auth::guard('client')->id())->get();
        return view('client.payment.index', compact('payments'));
    }

    public function notifications() {
        $notifications = Notification::with(['lawyer','client'])->whereIn("recipient", array("Public","Clients"))->get();
        return view('client.notification.index', compact('notifications'));
    }

    public function cases() {
        $lawyers = Lawyer::select('id','fname','lname', 'practicing_area')->get();
        return view('client.case.caseRequest', compact('lawyers'));
    }

    public function caseStore(Request $request)
    {

        ClientCase::create($request->all());

        return redirect()->intended('client-client-case-view');
        
    }

    public function casesView() {
        $cases = ClientCase::where("client_id", "=",Auth::guard('client')->id())->get();
        return view('client.case.index', compact('cases'));
    }

}
