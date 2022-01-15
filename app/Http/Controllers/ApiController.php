<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json([
            'message' => true,
            'data' => Post::all()
        ]);
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'user_id' => 'required',
            'excerpt' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if ($request->file('image')) {

            $image = $request->file('image');
            $extension = uniqid() . "." .  $image->getClientOriginalExtension();
            $image->move(base_path() . "/public/post-image", $extension);
            $images = $extension;
        }

        try {
            $data = Post::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'image' => $images,
                'body' => $request->body,
                'user_id' => $request->user_id,
                'excerpt' => $request->excerpt
            ]);
            $response = [
                'message' => 'Post created',
                'data' => $data
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
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
        //
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
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'user_id' => 'required',
            'excerpt' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {

                $path = base_path() . "/public/post-image/" .  $request->oldImage;
                File::delete($path);
            }

            $image = $request->file('image');
            $extension = uniqid() . "." .  $image->getClientOriginalExtension();
            $images = $image->move(base_path() . "/public/post-image", $extension);
            $validateData['image'] = $extension;
        }


        try {
            Post::find($id)
                ->update($validateData);
            return response()->json([
                'message' => true,
                'data' => $validateData
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error',
                'data' => $th->getMessage(),
            ]);
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
        try {
            $post = Post::find($id);
            if ($post->image) {
                $path = base_path() . "/public/post-image/" .  $post->image;
                File::delete($path);
            }
            $post->delete();
            return response()->json([
                'message' => true,
                'data' => 'Berhasil di hapus'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error',
                'data' => $th->getMessage()
            ]);
        }
    }
}
