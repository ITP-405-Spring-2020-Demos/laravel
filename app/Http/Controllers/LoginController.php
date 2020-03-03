<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $isLoginSuccessful = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($isLoginSuccessful) {
            return redirect()->route('profile');
        } else {
            return redirect()->route('login');
        }
    }
}
