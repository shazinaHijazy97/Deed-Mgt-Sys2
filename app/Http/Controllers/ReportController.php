<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }

    public function lawyerReport()
    {
        return view('admin.report.lawyerReport');
    }

    public function deedReport()
    {
        return view('admin.report.deedReport');
    }

    public function paymentReport()
    {
        return view('admin.report.paymentReport');
    }

    public function attendenceReport()
    {
        return view('admin.report.attendenceReport');
    }

    public function appointmentReport()
    {
        return view('admin.report.appointmentReport');
    }
}
