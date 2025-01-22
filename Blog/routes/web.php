<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;



Route::get('/', [PostController::class, 'index']);

Route::get('/post/{post:slug}', function (Post $post) {

    return view("post", ['post' => $post]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view("category", [
        'posts' => $category->posts,
        'categories' => Category::all(),
        "currentCategory" => $category
    ]);
});

Route::get('/author/{author:username}', function (User $author) {
    return view("author", ['posts' => $author->posts, 'categories' => Category::all()]);
});
