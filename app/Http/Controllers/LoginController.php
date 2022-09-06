<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.index', [
            'title' => 'My Website - Login'



        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'Email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('LoginError', 'Login tidak berhasil!!');
    }
}
