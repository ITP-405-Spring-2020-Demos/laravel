<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('authentication.register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // bcrypt
        $user->save();

        Auth::login($user);

        return redirect()->route('profile');
    }
}
