<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'Email or password is incorrect.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return view('auth.login', ['message' => 'Logout successful']);
    }
}
