<?php

namespace App\Http\Controllers;

use App\Helper\apiPosts;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AboutApiController extends Controller
{
    public function index()
    {
        $data = About::all();
        if ($data) {
            return apiPosts::creatApi(200, 'Find Post Success');
        }
        return apiPosts::creatApi('403', 'Bad Gateway');
    }



    public function store(Request $request)
    {
        try {
            $request->validate([
                'Title' => 'required',
                'category_id' => 'required',
                'user_id' => 'required',
                'img' => 'image|required',
                'Deskripsi' => 'required'
            ]);

            $about = About::create([
                'Title' => $request->Title,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'img' => $request->img,
                'Deskripsi' => $request->Deskripsi

            ]);

            $data = About::where('id', $about->id);
            if ($data) {
                return apiPosts::creatApi(200, 'Data has been created', $data);
            }
            return apiPosts::creatApi(400, 'Bad Gateway');
        } catch (Exception $e) {
            return apiPosts::creatApi(400, 'Bad Gateway');
        }
    }

    public function show($id)
    {
        $about = About::findOrFail($id);
        $data = $about;

        if ($data) {
            return apiPosts::creatApi(200, 'Find Data Success');
        }
        return apiPosts::creatApi(404, 'Data Not Found');
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'Title' => 'required',
                'category_id' => 'required',
                'user_id' => 'required',
                'img' => 'image|required',
                'Deskripsi' => 'required'
            ]);

            $about = About::find($id);
            $about->update([
                'Title' => $request->Title,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'img' => $request->img,
                'Deskripsi' => $request->Deskripsi

            ]);
            $data = About::where('id',  $about->id);

            if ($data) {
                return apiPosts::creatApi(200, 'Update Data Success', $data);
            }
            return apiPosts::creatApi(400, 'Update Data Failed');
        } catch (Exception $e) {
            return apiPosts::creatApi(400, 'Update Data Failed');
        }
    }

    public function destroy($id)
    {
        $about = About::find($id);
        $data = $about->delete();
        if ($data) {
            return apiPosts::creatApi(200, 'Deleted Data Success');
        }
        return apiPosts::creatApi(400, 'Bad Gateway');
    }
}
