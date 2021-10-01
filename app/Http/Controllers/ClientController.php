<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->paginate(5);

        return view('admin.client.index', compact('clients'))->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('admin.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        Client::create($request->all());
        return redirect()->intended('admin-clients')->with('success', 'Client created successfully');

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
        $client = Client::find($id);
        return view('admin.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
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

        $client->update($request->all());
        return redirect()->intended('admin-clients')->with('success','Client updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->intended('admin-clients')->with('success','Client deleted successfully');
    }

    public function clientRegister()
    {
        return view('admin.client.register');
    }
}
