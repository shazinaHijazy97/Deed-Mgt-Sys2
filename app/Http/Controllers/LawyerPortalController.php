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

class LawyerPortalController extends Controller
{
    public function lawyer() {
        $lawyer = Lawyer::find(Auth::guard('lawyer')->id());
        return view('lawyer.lawyer.index',compact('lawyer'));
        
    }

    public function deedRequests() {
        $deedRequests = DeedRequests::where("lawyer_id", "=",Auth::guard('lawyer')->id())->get();
        return view('lawyer.deed.index', compact('deedRequests'));
    }

    public function viewAppointment() {
        $appointments = Appointment::where("lawyer_id", "=",Auth::guard('lawyer')->id())->get();
        return view('lawyer.appointment.index', compact('appointments'));
    }

    public function payments() {
        $payments = Payment::where("lawyer_id", "=",Auth::guard('lawyer')->id())->get();
        return view('lawyer.payment.index', compact('payments'));
    }

    public function notifications() {
        $notifications = Notification::with(['lawyer','lawyer'])->whereIn("recipient", array("Public","Lawyers"))->get();
        return view('lawyer.notification.index', compact('notifications'));
    }

    public function casesView() {
        $cases = ClientCase::where("lawyer_id", "=",Auth::guard('lawyer')->id())->get();
        return view('lawyer.case.index', compact('cases'));
    }

}
