<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function index()
    // {
    //     //
    // }

    public function systemLogin(Request $request)
    {
        $request->validate([
            'email'  => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //Authentication passed..
            return redirect()->intended('admin-dashboard')->withSuccess('Signed In');

        } else if (Auth::guard('lawyer')->attempt($credentials)) {
            //Authentication passed..
            return redirect()->intended('lawyer-dashboard');

        } else if (Auth::guard('client')->attempt($credentials)) {
            //Authentication passed..
            return redirect()->intended('client-dashboard');
        }

        return redirect("/")->withSuccess('Login details are invalid');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
