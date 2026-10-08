<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(9);
        return view('user.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('user.posts.show', compact('post'));
    }
}
