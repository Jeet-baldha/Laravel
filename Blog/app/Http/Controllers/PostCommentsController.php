<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {

        request()->validate([
            "body" => "required"
        ]);

        $c = $post->comment()->create([
            "user_id" => auth()->user()->id,
            "body" => request("body")
        ]);


        return back();
    }
}
