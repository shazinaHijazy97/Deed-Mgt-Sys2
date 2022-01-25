<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lawyer;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with(['lawyer','client'])->get();

        return view('admin.payment.index', compact('payments'));
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
    
        return view('admin.payment.makePayment',compact('lawyers', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payment::create($request->all());
        return redirect()->intended('admin-payment')->with('success', 'Pyment Made successfully');
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

        $payment = Payment::with(['lawyer','client'])->find($id);

         return view('admin.payment.edit', compact ('payment','lawyers', 'clients'));
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
                'payment_type' =>'required',
                'amount' =>'required',
            ]
        ); 

        $payment = Payment::findOrFail($id)->update($request->all());
        return redirect()->intended('admin-payment')->with('success','Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id)->delete();

        return redirect()->intended('admin-payment')->with('success','Payment deleted successfully');
    }
}
