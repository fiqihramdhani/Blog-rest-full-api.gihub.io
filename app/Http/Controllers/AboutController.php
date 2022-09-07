<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Routing\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('About', [
            'title' => 'My website - About',
            'active' => 'About',
            'Posts' => About::latest()->get()

        ]);
    }

    public function show($id)
    {
        $Post = About::find($id);
        return view('AboutPost', [
            'title'  => 'My Website | About - post',
            'Posts' => $Post

        ]);
    }
}
