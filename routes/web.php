<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// =================================INDEX
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// =================================RESOURCE ROUTE
Route::resource('posts', PostController::class);