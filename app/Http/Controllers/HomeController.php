<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home', [
            "title" => "My Website - Home",
            "Posts" => Home::latest()->filter(request(['search', 'Category', 'User']))->paginate(6)->withQueryString()

        ]);
    }

    public function show(Home $Post)
    {
        return view('Homes.HomePost', [
            "title" => "My Website || Home - Post",
            "active" => "Posts",
            "Posts" => $Post
        ]);
    }
}
