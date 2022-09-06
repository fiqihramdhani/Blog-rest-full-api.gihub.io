<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\apiPosts;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $data = User::where('id', auth()->user()->id);

        // if ($data) {
        //     return apiPosts::creatApi(200, 'Success', $data);
        // } else {

        //     return apiPosts::creatApi(400, 'Bad Gateway');
        // }
    }

    public function store(Request $request)
    {
        try {
            $User = $request->validate([
                'Nama' =>  'required',
                'Email' => 'required',
                'password' => 'required|min:5|max:20|'

            ]);

            $User['password'] = Hash::make($User['password']);
            User::create($User);

            $data = $User;

            if ($data) {
                return apiPosts::creatApi(200, 'Success', $data);
            } else {

                return apiPosts::creatApi(400, 'Bad Gateway');
            }
        } catch (Exception $e) {
            return apiPosts::creatApi(400, 'Bad Gateway' . $e);
        }
    }
}
