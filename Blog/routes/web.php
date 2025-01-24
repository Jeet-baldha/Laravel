<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;



Route::get('/', [PostController::class, 'index']);

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware("guest");

Route::post('post/{post:slug}/comment', [PostCommentsController::class, "store"]);

Route::get('/login', [SessionController::class, 'create']);

Route::post('/login', [SessionController::class, 'store']);

Route::post('logout', [SessionController::class, 'destroy']);
