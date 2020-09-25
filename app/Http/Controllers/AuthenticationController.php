<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        dd(Auth::user());

        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $result = Auth::attempt($credentials, true);
    dd($result);
    }

    public function logout()
    {

    }
}
