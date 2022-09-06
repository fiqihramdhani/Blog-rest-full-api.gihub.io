<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helper\apiPosts;
use Exception;
use Illuminate\Support\Str;

class HomeApiController extends Controller
{
    public function index()
    {
        $data = Home::All();

        if ($data) {
            return apiPosts::creatApi(200, 'Success', $data);
        } else {

            return apiPosts::creatApi(400, 'Bad Gateway');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'Title' => 'required',
                'category_id' => 'required',
                'user_id' => 'required',
                'img' => 'required',
                'Judul_Posting' => 'required',
                'slug' => 'required',
                'exerpt' => 'required',
                'Body' => 'required'
            ]);

            $Post = Home::create([
                'Title' => $request->Title,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'img' => $request->img,
                'Judul_Posting' => $request->Judul_Posting,
                'slug' => $request->Title,
                'excerpt' => $request->excerpt,
                'Body' => $request->Body

            ]);

            $request['excerpt'] = Str::limit(strip_tags($request->Body, 250));

            $data = Home::where('id', $Post->id)->get();
            if ($data) {
                return apiPosts::creatApi(200, 'Create data Success', $data);
            } else {

                return apiPosts::creatApi(400, 'Create data failed');
            }
        } catch (Exception $e) {
            return apiPosts::creatApi(400, 'Create data failed' . $e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'Title' => 'required',
                'category_id' => 'required',
                'user_id' => 'required',
                'img' => 'required',
                'Judul_Posting' => 'required',
                'slug' => 'required',
                'exerpt' => 'required',
                'Body' => 'required'
            ]);
            $Post = Home::find($id);
            $Post->update([
                'Title' => $request->Title,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'img' => $request->img,
                'Judul_Posting' => $request->Judul_Posting,
                'slug' => $request->Title,
                'excerpt' => $request->excerpt,
                'Body' => $request->Body

            ]);

            $request['excerpt'] = Str::limit(strip_tags($request->Body, 250));

            $data = Home::where('id', $Post->id)->get();
            if ($data) {
                return apiPosts::creatApi(200, 'Create data Success', $data);
            } else {

                return apiPosts::creatApi(400, 'Create data failed');
            }
        } catch (Exception $e) {
            return apiPosts::creatApi(400, 'Create data failed' . $e);
        }
    }

    public function show($id)
    {
        $Post = Home::find($id);
        $data = Home::where('id', $Post->id);
        if ($data) {
            return apiPosts::creatApi(200, 'Create data Success', $data);
        } else {

            return apiPosts::creatApi(400, 'Create data failed');
        }
    }

    public function delete($id)
    {
        $Post = Home::findOrFail($id);
        $data = $Post->delete();
        if ($data) {
            return apiPosts::creatApi(200, 'Data has been deleted', $data);
        } else {

            return apiPosts::creatApi(400, 'Failed to delete data');
        }
    }
}
