<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // After the existing Breeze routes add the following routes:
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{posts}/edit', [PostController::class, 'edit'])->name('posts.edit');
});
// Outside the middleware group, add a route to display posts publicly:
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{posts}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
