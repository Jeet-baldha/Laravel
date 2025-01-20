<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;





Route::get('/', function () {

    $posts = Post::all();

    return view('home', ['posts' => $posts]);
});

Route::get('/post/{slug}', function ($slug) {

    return view("post", ['post' => Post::find($slug)]);
})->where('post', '[a-Z_/-');
