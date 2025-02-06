<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home']);

Route::middleware(Admin::class)->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create']);
    Route::post('users/create', [UserController::class, 'store']);
    Route::get('users/{user}/delete', [UserController::class, 'delete']);
    Route::get('users/{user}/edit', [UserController::class, 'edit']);
    Route::patch('users/{user}/edit', [UserController::class, 'update']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/API/v1.php';
