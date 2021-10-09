<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::latest()->paginate(5);

        return view('admin.staff.index', compact('staff'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' =>'required',
            'lname' =>'required',
            'gender' =>'required',
            'nic' =>'required',
            'contact' =>'required',
            'address' =>'required',
            'email' =>'required',
            'password' =>'required',
        ]);

        Staff::create($request->all());

        return redirect()->route('admin-staff.index')->with('success','staff created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);

        $staff = Staff::find($id);
        // dd($staff);
        return view('admin.staff.edit')->with('staff' ,$staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'fname' =>'required',
            'lname' =>'required',
            'gender' =>'required',
            'nic' =>'required',
            'contact' =>'required',
            'address' =>'required',
            'email' =>'required',
            'password' =>'required',
        ]);
        
        $staff = Staff::findOrFail($id)->update($request->all());


        return redirect()->route('admin-staff.index')->with('success','staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id)->delete();
        return redirect()->route('admin-staff.index')->with('success','staff deleted successfully');
    }

    public function staffRegister()
    {
        return view('admin.staff.register');
    }
}
