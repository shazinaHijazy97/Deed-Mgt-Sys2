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
            return redirect()->intended('admin-dashboard')
                            ->withSuccess('Signed In');
        }

        return redirect("/")->withSuccess('Login details are invalid');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
