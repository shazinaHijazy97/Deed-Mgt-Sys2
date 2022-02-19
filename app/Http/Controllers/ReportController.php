<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Lawyer;
use App\Models\Staff;
use DB;

class ReportController extends Controller
{
    public function clientReport()
    {
        return view('admin.report.clientReport');
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
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        $staffs = Staff::select('id','nic','fname','lname')->get();

        return view('admin.report.attendenceReport', compact('lawyers','staffs'));
    }

    public function appointmentReport()
    {
        return view('admin.report.appointmentReport');
    }

    public function caseReport()
    {
        return view('admin.report.caseReport');
    }

    public function checkAttendance(Request $request)
    {
        // dd($request);
        $nic = $request->nic;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;

        $attendances = DB::table('attendances')
                        // ->join('lawyers', 'lawyers.nic', '=', 'attendances.nic')
                        // ->join('staff', 'staff.nic', '=', 'attendances.nic')
                        // ->where('nic', $nic)
                        ->whereBetween('date_in', [$dateFrom, $dateTo])
                        ->get();
        // dd($attendances);
        $count = count($attendances);
        return view('admin.report.results.attendance-report', compact('attendances', 'count', 'nic', 'dateFrom', 'dateTo'));
    }
}
