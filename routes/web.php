<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route to display all the available posts
Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

// Route to display all the available posts
Route::get('posts', [PostController::class, 'index'])->name('posts.index');

// route to create a post
// Route::view('posts/create', 'posts/create-post')->name('posts.create');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

// Rouet to strore the data into the database
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');

// Route to handle a signle record
Route::get('posts/show/{id}', [PostController::class, 'show'])->name('posts.show');

// Route to handle editing a post
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');

// Route to handle the update functionality
Route::patch('posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

// Route to delete the post
Route::delete('posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');