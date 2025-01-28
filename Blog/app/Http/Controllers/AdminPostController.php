<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Category;
class AdminPostController extends Controller
{
    public function create()
    {

        return view('admin.posts.create');
    }

    public function index()
    {
        return view('admin.posts.index', [
            "posts" => Post::latest()->paginate(10)
        ]);
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


        Post::create($attributes);

        return redirect('/')->with("sucess", "Post added");
    }

    public function edit(Post $post)
    {
        return view("admin/posts/edit", [
            "post" => $post
        ]);
    }

    public function update(Post $post)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]

        ]);


        if (isset($attributes['thumbnail'])) {

            $attributes['thumbnail'] = request()->file('thumbnail')->store("thumbnails");
        }


        $post->update($attributes);

        return back()->with("sucess", "Post Update");
    }

    public function delete(Post $post)
    {
        $post->delete();

        return back()->with('success', "Post Deleted");
    }
}
