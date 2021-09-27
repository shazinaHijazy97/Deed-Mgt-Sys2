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
            'address' =>'required',
            'email' =>'required',
            'contact' =>'required',
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
            'address' =>'required',
            'email' =>'required',
            'contact' =>'required',
            'password' =>'required',
        ]);
        // dd($request->all());

        $client->update($request->all());
        // $client->save();
        // $client->update([
        //     'fname' =>request('fname'),
        //     'lname' =>request('lname'),
        //     'gender' =>request('gender'),
        //     'nic' =>request('nic'),
        //     'address' =>request('address'),
        //     'email' =>request('email'),
        //     'contact' =>request('contact'),
        //     'password' =>request('password'),
        // ]);
        // $client->save();

        // dd($client);
        return redirect()->intended('admin-clients')->with('success','Client updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function clientRegister()
    {
        return view('admin.client.register');
    }
}
