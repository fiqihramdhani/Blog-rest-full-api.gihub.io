<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi', [
            'title' => 'My website - Registrasi',
            'active' => 'Registrasi'


        ]);
    }

    public function store(Request $request)
    {
        $User = $request->validate([
            'Nama' => 'required',
            'Email' => 'required',
            'password' => ['required', 'min:5', 'max:255']
        ]);

        $User['password'] = Hash::make($User['password']);
        $User = User::create($User);


        return redirect('/Login')->with('User Berhasil di tambahkan');
    }
}
