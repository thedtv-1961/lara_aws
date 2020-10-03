<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
