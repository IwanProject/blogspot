<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravelista\Comments\Comment;

class CommentsController extends Controller
{
    public function index(){
        return view('dashboard.comments.index', ['title' => 'All Comments', 'comment' => Comment::all()]);
    }
}
