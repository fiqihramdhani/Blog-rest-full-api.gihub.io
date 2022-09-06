<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class HomePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Post = Home::all();
        return view('/', [
            'title' => 'My Website - Dashboard |  Home - Post ',
            'Post' => $Post

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Posts.create', [
            'title' => 'Dashboard Create - Post',
            'Category' => Category::All()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'Title' => 'required|max:255',
            'img' => 'image|file|max:2024',
            'category_id' => 'required',
            'Judul_Posting' => 'required', 'max:255',
            'slug' => 'required',
            'Body' => 'required'
        ]);

        if ($request->file('img')) {
            $validateData['img'] = $request->file('img')->store('post-images');
        }

        $validateData['user_id'] = auth()->User()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->Body, 250));
        Home::create($validateData);

        return redirect('/Dashboard/Posts')->with('Success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post = Home::find($id);
        return view('Dashboard.Posts.show', [
            'title' => ' Dashboard | Show - Post',
            'Post' => $Post


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Post = Home::find($id);
        return view('Dashboard.Posts.edit', [
            'title' => 'Dashboard - Edit',
            'Category' => Category::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $Post)
    {
        $rules = [
            'Title' => 'required|max:255',
            'img' => 'required',
            'category_id' => 'required',
            'Judul_Posting' => 'required', 'max:255',
            'Body' => 'required'
        ];

        if ($request->slug != $Post->slug) {
            $rules['slug'] = 'required';
        }
        $validateData = $request->validate($rules);

        if ($request->file('img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['img'] = $request->file('img')->store('post-images');
        }


        $validateData['user_id'] = auth()->User()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->Body, 250));
        Home::where('id', $Post->id)
            ->update($validateData);

        return redirect('/Dashboard/Posts')->with('success', 'Post has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $Post)
    {
        Home::destroy($Post->id);
        if ($Post->img) {
            Storage::delete($Post->img);
        }
        Home::destroy($Post->id);
        return redirect('/Dashboard/Posts')->with('success', 'New Posts has been deleted!!');
    }
}
