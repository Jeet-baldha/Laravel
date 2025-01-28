<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewslatterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index']);

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::post('post/{post:slug}/comment', [PostCommentsController::class, "store"]);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware("guest");

Route::get('/login', [SessionController::class, 'create']);

Route::post('/login', [SessionController::class, 'store']);

Route::post('logout', [SessionController::class, 'destroy']);

Route::post('newslatter', NewslatterController::class);

Route::middleware(Admin::class)->group(function () {

    Route::get('admin/dashboard', [AdminPostController::class, 'index']);

    Route::get('admin/post/create', [AdminPostController::class, 'create']);

    Route::post('admin/post/create', [AdminPostController::class, 'store']);

    Route::get('admin/post/{post:id}/edit', [AdminPostController::class, 'edit']);

    Route::patch('admin/post/{post}', [AdminPostController::class, 'update']);

    Route::delete('admin/post/{post}', [AdminPostController::class, 'delete']);

});
