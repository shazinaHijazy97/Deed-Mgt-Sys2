<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Lawyer;
use App\Models\Client;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::with(['lawyer','client'])->get();

        return view('admin.notification.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        $clients = Client::select('id','nic','fname','lname')->get();
    
        return view('admin.notification.postNotice',compact('lawyers', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Notification::create($request->all());
        return redirect()->intended('admin-notification')->with('success', 'Notification sent successfully');
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
        $lawyers = Lawyer::select('id','nic','fname','lname')->get();
        $clients = Client::select('id','nic','fname','lname')->get();

        $notifications = Notification::with(['lawyer','client'])->find($id);
         return view('admin.notification.edit', compact ('notifications','lawyers', 'clients'));
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
                'notice_subject' =>'required',
                'notice_content' =>'required',
                'notice_date' =>'required',
                'notice_time' =>'required',
                'notice_type' =>'required',
                'recipient' =>'required',
            ]
        ); 

        $notifications = Notification::findOrFail($id)->update($request->all());
        return redirect()->intended('admin-notification')->with('success','Notification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notifications = Notification::findOrFail($id)->delete();

        return redirect()->intended('admin-notification')->with('success','Notification deleted successfully');
    }
}
