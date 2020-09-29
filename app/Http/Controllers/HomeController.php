<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function error()
    {
        return view('error');
    }

    public function my_403()
    {
        abort(403);
    }
    public function my_404()
    {
        abort(404);
    }

    public function hi()
    {
        return view('hi');
    }

    public function checkAdminGate()
    {
        if (Gate::allows('check-admin-gate')) {
            echo 'You are ADMIN';
        } else {
            echo 'Your are not ADMIN';
        }
    }
}
