<?php

namespace App\Http\Controllers;

use App\Models\DeedRequests;
use App\Models\Client;
use Illuminate\Http\Request;
use DB;

class DeedRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deedRequests = DeedRequests::all();

        return view('admin.deed.index', compact('deedRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::select('id','nic','fname','lname')->get();
        return view('admin.deed.deedRequests',compact('clients'));
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
            'client_id' =>'required',
            'deed_no' =>'required',
            'deed_type' =>'required',
            'request_date' =>'required',
            'payment_status' =>'required',
        ]);

        DeedRequests::create($request->all());

        return redirect()->route('admin-deed-requests.index')->with('success','Request Sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeedRequests  $deedRequests
     * @return \Illuminate\Http\Response
     */
    public function show(DeedRequests $deedRequests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeedRequests  $deedRequests
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deedRequests = DeedRequests::find($id);
        $clients = Client::select('id','nic','fname','lname')->get();
        // dd($deedRequests->id);
        return view('admin.deed.edit',compact('deedRequests' ,'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeedRequests  $deedRequests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' =>'required',
            'deed_no' =>'required',
            'deed_type' =>'required',
            'request_date' =>'required',
            'payment_status' =>'required',
        ]);
        
        $deedRequests = DeedRequests::findOrFail($id)->update($request->all());

        return redirect()->route('admin-deed-requests.index')->with('success','Request updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeedRequests  $deedRequests
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deedRequests = DeedRequests::findOrFail($id)->delete();
        return redirect()->route('admin-deed-requests.index')->with('success','Request deleted successfully');
    }

    public function deedRequests()
    {
        return view('admin-deed.deedRequests');
    }
}
