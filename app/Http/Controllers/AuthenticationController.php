<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('hi');
        }

        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $result = Auth::attempt($credentials, true);

        return $result ? redirect()->route('hi') : redirect()->route('authentication.login');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('authentication.login');
    }
}
