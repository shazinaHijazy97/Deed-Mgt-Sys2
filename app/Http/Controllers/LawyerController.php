<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use Illuminate\Http\Request;
use DB;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyers = Lawyer::latest()->paginate(5);

        return view('admin.lawyer.index', compact('lawyers'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lawyer.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lawyer::create($request->all());

        return redirect()->route('admin-lawyers.index')->with('success','Lawyer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function show(Lawyer $lawyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    // public function edit(Lawyer $lawyer)
    public function edit($id)
    {
        // dd($id);

        // return view('admin.lawyer.edit', compact('lawyer'));
        $lawyer = Lawyer::find($id);
        // dd($lawyer);
        return view('admin.lawyer.edit')->with('lawyer' ,$lawyer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lawyer $lawyer)
    {
        // dd($request->id);
        // $lawyer->
        // Lawyer::update($request->all());
        // Lawyer::where('id', $lawyer->id)->update($request->all());
        // Lawyer::where('id', $lawyer->id)->update(
        //     [
        //             'fname' => request('fname'),
        //             'lname' => request('lname'),
        //             'gender' => request('gender'),
        //             'nic' => request('nic'),
        //             'address' => request('address'),
        //             'contact' => request('contact'),
        //             'email' => request('email'),
        //             'password' => request('password'),
        //         ]
        // );
        DB::table('lawyers')->where('id', $lawyer->id)->update([
            'fname' =>$request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'nic' => $request->nic,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // $lawyer -> update([
        //     'fname' => request('fname'),
        //     'lname' => request('lname'),
        //     'gender' => request('gender'),
        //     'nic' => request('nic'),
        //     'address' => request('address'),
        //     'contact' => request('contact'),
        //     'email' => request('email'),
        //     'password' => request('password'),
        // ]);

        // dd($lawyer);
        // dump(request('fname'));

        return redirect()->route('admin-lawyers.index')->with('success','Lawyer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lawyer $lawyer)
    {
        $lawyer->delete();
        return redirect()->route('admin-lawyers.index')->with('success','Lawyer deleted successfully');
    }
}
