<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;

class ReviewController extends Controller
{
    public function index()
    {
        return view('dashboard.post_review.index',['title' => 'Review Post', 'posts' => Post::where('published_at', '=', 0)->get()]);
    }

    public function publish(Request $request)
    {
        $data = Post::find($request->post_id);


        Post::where('id',$data->id)
                    ->update(['published_at' => 1,
                            'status' => 'publish'
                    ]);
        return redirect('/dashboard/post_review')->with('success','Published Successfully!');

    }
    public function unpublish(Request $request)
    {
        $data = Post::find($request->post_id);


        Post::where('id',$data->id)
                    ->update(['published_at' => 2,
                            'status' => 'unpublish'
                    ]);
        return redirect('/dashboard/post_review')->with('success','Post unpublished!');

    }

    public function comments_review()
    {
        return view('dashboard.comments_review.index',['title' => 'Review Comments', 'comment' => Comment::where('is_approved', '=', 0)->get()]);
    }

    public function comments_publish(Request $request)
    {
        $data = Comment::find($request->comments_id);


        Comment::where('id',$data->id)
                    ->update(['is_approved' => 1,
                    'status' => 'publish'
                    ]);
        return redirect('/dashboard/comments_review')->with('success','Published Successfully!');

    }

    public function comments_unpublish(Request $request)
    {
        $data = Comment::find($request->comments_id);


        Comment::where('id',$data->id)
        ->update(['is_approved' => 2,
                    'status' => 'unpublish'
        ]);
        return redirect('/dashboard/comments_review')->with('success','Post unpublished!');

    }
}
