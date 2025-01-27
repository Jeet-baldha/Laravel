<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;


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
    public function create()
    {
        if (auth()->guest()) {
            abort(403);
        }

        if (auth()->user()->username !== "jeet-baldha") {
            abort(403);
        }
        return view('posts.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]

        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store("thumbnails");


        $p = Post::create($attributes);

        dd($p);
        return redirect('/')->with("sucess", "Post added");
    }
}
