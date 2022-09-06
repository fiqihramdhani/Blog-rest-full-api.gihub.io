<?php

namespace App\Http\Controllers;


use App\Models\Category;

use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('J', [
            "title" => "Category",
            "Categories" => Category::all()
        ]);
    }



    public function show(Category $id)
    {
        $Category = Category::find($id);
        return view('/Dashboard/Posts/Category', [
            "title" => "My Website - $Category->Jurusan",
            "Posts" => $Category

        ]);
    }
}
