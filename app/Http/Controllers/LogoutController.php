<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function Logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate(session());

        $request->session()->regenerateToken();



        return redirect('/Login');
    }
}
