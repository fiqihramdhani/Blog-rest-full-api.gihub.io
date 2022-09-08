<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AboutPostController extends Controller
{
    public function index()
    {
        return view('About.Posts.index', [
            "title" => "My Website | Dashboard - Home",
            "Post" => About::where('user_id', auth()->User()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('About.Posts.Create', [
            "Category" => Category::all()
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
        $validateData = $request->validate([
            'Title' => 'required|max:255',
            'img' => 'image|file|max:2024',
            'category_id' => 'required',
            'Deskripsi' => 'required', 'max:255',
            'slug' => 'required'
        ]);

        if ($request->file('img')) {
            $validateData['img'] = $request->file('img')->store('post-images');
        }
        $validateData['e_About'] = Str::limit(strip_tags($request->Deskripsi, 250));
        $validateData['user_id'] = auth()->User()->id;
        About::create($validateData);

        return redirect('/Dashboard/About/Posts')->with('success', 'New Posts has been added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About $Post
     * @return \Illuminate\Http\Response
     */
    public function show(About $Post)
    {
        // if ($Post->User->id !== auth()->User()->id) {
        //     abort(403);
        // }

        return view('About.Posts.Show', [
            "Post" => $Post


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About $Post
     * @return \Illuminate\Http\Response
     */
    public function edit(About $Post)
    {



        return view('About.Posts.Edit', [
            'Post' => $Post,
            "Categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $Post)
    {
        $rules = [
            'Title' => 'required|max:255',
            'img' => 'image|file|max:2024',
            'category_id' => 'required',
            'Deskripsi' => 'required', 'max:255',
            'slug' => 'required'
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

        $validateData['e_About'] = Str::limit(strip_tags($request->Deskripsi, 250));
        About::where('id', $Post->id)
            ->update($validateData);

        return redirect('/Dashboard/About/Posts')->with('success', 'Post has been Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $Post)
    {
        About::destroy($Post->id);
        if ($Post->img) {
            Storage::delete($Post->img);
        }

        About::destroy($Post->id);

        return redirect('/Dashboard/About/Posts')->with('success', 'New Posts has been deleted!!');
    }

    public function aboutCheckSlug(Request $request)
    {
        $slug = SlugService::createSlug(About::class, 'slug', $request->Title);
        return response()->json(['slug' => $slug]);
    }
}
