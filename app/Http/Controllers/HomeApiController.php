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
                'T_Home' => 'required',
                'category_id' => 'required',
                'user_id' => 'required',
                'img' => 'required',
                'J_Home' => 'required',
                'slug' => 'required',
                'e_Home' => 'required',
                'B_Home' => 'required'
            ]);

            $Post = Home::create([
                'T_Home' => $request->Title,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'img' => $request->img,
                'J_Home' => $request->Judul_Posting,
                'slug' => $request->Title,
                'e_Home' => $request->excerpt,
                'B_Home' => $request->Body

            ]);

            $request['e_Home'] = Str::limit(strip_tags($request->B_Home, 250));

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
                'T_Home' => 'required',
                'category_id' => 'required',
                'user_id' => 'required',
                'img' => 'required',
                'J_Home' => 'required',
                'slug' => 'required',
                'e_Home' => 'required',
                'B_Home' => 'required'
            ]);
            $Post = Home::find($id);
            $Post->update([
                'T_Home' => $request->Title,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'img' => $request->img,
                'J_Home' => $request->Judul_Posting,
                'slug' => $request->Title,
                'e_Home' => $request->excerpt,
                'B_Home' => $request->Body

            ]);

            $request['e_Home'] = Str::limit(strip_tags($request->B_Home, 250));

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
        $data = Home::where('id', $id)->get();
        if ($data) {
            return apiPosts::creatApi(200, 'Create data Success', $data);
        } else {

            return apiPosts::creatApi(400, 'Create data failed');
        }
    }

    public function destroy($id)
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
