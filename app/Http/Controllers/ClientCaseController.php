<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientCase;
use App\Models\Client;
use App\Models\Lawyer;

class ClientCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientCases = ClientCase::all();

        return view('admin.case.index', compact('clientCases'));
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
    
        return view('admin.case.caseRequest',compact('lawyers', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ClientCase::create($request->all());
        return redirect()->intended('admin-client-case')->with('success', 'Case Added successfully');
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

        $clientCases = ClientCase::with(['lawyer','client'])->find($id);

         return view('admin.case.edit', compact ('clientCases','lawyers', 'clients'));
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
        $request->validate([
            'client_id' =>'required',
            'title' =>'required',
            'lawyer_id' =>'required',
            'case_type' =>'required',
            'note' =>'required',
        ]);
        
        $clientCases = ClientCase::findOrFail($id)->update($request->all());
        return redirect()->route('admin-client-case.index')->with('success','Case updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientCases = ClientCase::findOrFail($id)->delete();
        return redirect()->route('admin-client-case.index')->with('success','Case deleted successfully');
    }
}
