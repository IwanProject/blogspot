<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\User;


class PostController extends Controller
{


    public function show(Post $post)
    {
        return view('post', [
            'title' => $post->title,
            'post' => $post,
            'categories' => Category::all(),
            'posts' => Post::inRandomOrder()->limit(2)->get(),
            'news' =>Post::inRandomOrder()->limit(4)->get()

        ]);
    }
}
