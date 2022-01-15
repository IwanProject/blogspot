<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index',[
                'title' => 'Categories',
                'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create',['title' => 'Create categories']);
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
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){

            $image = $request->file('image');
            $extension = uniqid() ."." .  $image->getClientOriginalExtension();
            $images = $image->move(base_path() . "/public/post-image", $extension);
            $validateData['image'] = $extension;

        }


        Category::create($validateData);
        return redirect('/dashboard/categories')->with('success','New categories has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',[
            'title' => $category->name,
            'categories' => $category

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
     

        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
            'image' => 'image|file|max:1024'
        ];

        if($request->slug != $category->slug){
            $rules['slug'] = 'required|unique:categories';
        }
        
        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){

                $path = base_path() . "/public/post-image/" .  $request->oldImage;
                File::delete($path);
            }

            $image = $request->file('image');
            $extension = uniqid() ."." .  $image->getClientOriginalExtension();
            $images = $image->move(base_path() . "/public/post-image", $extension);
            $validateData['image'] = $extension;
        }



       Category::where('id',$category->id)
                    ->update($validateData);
        return redirect('/dashboard/categories')->with('success','Categories has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image){
            $path = base_path() . "/public/post-image/" .  $category->image;
            File::delete($path);
        }
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success','Categories has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug' , $request->name);
        return response()->json(['slug' => $slug]);
    }
}
