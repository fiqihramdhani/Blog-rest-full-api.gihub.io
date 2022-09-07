<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\apiPosts;
use App\Models\Category;
use Exception;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::All();

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
        //
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

                'Nama' => 'required',
                'slug' => 'required'


            ]);

            $Category = Category::create([
                'Nama' => $request->Nama,
                'slug' => $request->slug,


            ]);

            $data = Category::where('id', $Category->id)->get();
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
        $data = Category::where('id', $id)->get();
        if ($data) {
            return apiPosts::creatApi(200, 'Create data Success', $data);
        } else {

            return apiPosts::creatApi(400, 'Create data failed');
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

                'Nama' => 'required',
                'slug' => 'required'


            ]);
            $Category = Category::findOrFail($id);
            $Category->update([
                'Nama' => $request->Nama,
                'slug' => $request->slug,


            ]);

            $data = Category::where('id', $Category->id)->get();
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
        $Category = Category::findOrFail($id);
        $data = $Category->delete();
        if ($data) {
            return apiPosts::creatApi(200, 'Data has been deleted', $data);
        } else {

            return apiPosts::creatApi(400, 'Failed to delete data');
        }
    }
}
