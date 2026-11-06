<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', ['user' => Auth::user()]);
    }

    public function profile()
    {
        return response('User profile controller is set up.');
    }

    public function orders()
    {
        return response('User orders controller is set up.');
    }
}
