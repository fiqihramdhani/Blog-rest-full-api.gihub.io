<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\apiPosts;
use Exception;
use Illuminate\Support\Str;



class BlogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Post::All();

        if ($data) {
            return apiPosts::creatApi(200, 'Success', $data);
        } else {

            return apiPosts::creatApi(400, 'Bad Gateway');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'Title' => 'required|max:255',
                'img' => 'image|file|max:2024',
                'category_id' => 'required',
                'user_id' => 'required',
                'Judul_Posting' => 'required', 'max:255',
                'slug' => 'required',
                'Body' => 'required',
                'excerpt' => 'required'
            ]);

            $Post = Post::create([
                'Title' => $request->Title,
                'img' => $request->img,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'Judul_Posting' => $request->Judul_Posting,
                'slug' => $request->slug,
                'Body' => $request->Body,
                'excerpt' => $request->excerpt,



            ]);

            $request['excerpt'] = Str::limit(strip_tags($request->Body, 250));

            $data = Post::where('id', $Post->id)->get();
            if ($data) {
                return apiPosts::creatApi(200, 'Create data Success', $data);
            } else {

                return apiPosts::creatApi(400, 'Create data failed');
            }
        } catch (Exception $error) {

            return apiPosts::creatApi(400, 'Create data failed' . $error);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::where('id', $id)->get();
        if ($data) {
            return apiPosts::creatApi(200, 'Find Post Success', $data);
        } else {

            return apiPosts::creatApi(400, 'Find Post Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'Title' => 'required|max:255',
                'img' => 'image|file|max:2024',
                'category_id' => 'required',
                'user_id' => 'required',
                'Judul_Posting' => 'required', 'max:255',
                'slug' => 'required',
                'Body' => 'required',
                'excerpt' => 'required'

            ]);
            $Post = Post::findOrFail($id);
            $Post->update([
                'Title' => 'required|max:255',
                'img' => 'image|file|max:2024',
                'category_id' => 'required',
                'user_id' => 'required',
                'Judul_Posting' => 'required', 'max:255',
                'slug' => 'required',
                'Body' => 'required',
                'excerpt' => 'required'

            ]);

            $data = Post::where('id', $Post->id)->get();
            if ($data) {
                return apiPosts::creatApi(200, 'Create data Success', $data);
            } else {

                return apiPosts::creatApi(400, 'Create data failed');
            }
        } catch (Exception $error) {

            return apiPosts::creatApi(400, 'Create data failed' . $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::findOrFail($id);
        $data = $Post->delete();
        if ($data) {
            return apiPosts::creatApi(200, 'Data has been deleted', $data);
        } else {

            return apiPosts::creatApi(400, 'Failed to delete data');
        }
    }
}
