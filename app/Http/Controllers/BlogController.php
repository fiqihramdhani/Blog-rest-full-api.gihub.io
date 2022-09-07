<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Routing\Controller;



class BlogController extends Controller
{
    public function index()
    {

        return view('Blog', [
            "title" => "My Website - Blog",
            "Posts" => Post::latest()->filter(request(['search', 'Category', 'User']))->paginate(3)->withQueryString()

        ]);
    }



    public function show(Post $Post)
    {
        return view('Post', [
            "title" => "My Website - Post",
            "active" => "Posts",
            "Posts" => $Post
        ]);
    }
}
