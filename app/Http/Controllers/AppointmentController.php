<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Lawyer;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with(['lawyer','client'])->get();

        return view('admin.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lawyers = Lawyer::select('id','nic','fname','lname','practicing_area')->get();
        $clients = Client::select('id','nic','fname','lname')->get();
    
        return view('admin.appointment.makeAppointment',compact('lawyers', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return redirect()->intended('admin-appointment')->with('success', 'Appointment Made successfully');

        } else {
            // dd("time slot is not available ".$availability);.
            echo "<script>";
            echo "alert('Appointment Time Slot Is Not Available!');";
            echo "window.history.back();";
            echo "</script>";

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lawyers = Lawyer::select('id','nic','fname','lname','practicing_area')->get();
        $clients = Client::select('id','nic','fname','lname')->get();

        $appointment = Appointment::with(['lawyer','client'])->find($id);
        // $appointment = Appointment::find($id);
        // return view('admin.appointment.edit', compact ('appointment'));

         return view('admin.appointment.edit', compact ('appointment','lawyers', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'client_id' =>'required',
                'lawyer_id' =>'required',
                'date' =>'required',
                'time' =>'required',
                'appointment_status' =>'required',
            ]
        ); 

        $appointment = Appointment::findOrFail($id)->update($request->all());
        return redirect()->intended('admin-appointment')->with('success','Appointment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id)->delete();

        return redirect()->intended('admin-appointment')->with('success','Appointment deleted successfully');
    }
}
