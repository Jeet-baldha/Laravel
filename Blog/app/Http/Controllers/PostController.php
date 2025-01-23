<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::latest()->filter()->paginate(6);

        return view('posts.index', [
            'posts' => $posts,

        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", ['post' => $post]);
    }
}
