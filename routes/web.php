<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Entry point to our project
Route::get('/', [UserController::class, 'welcomUser']);

// Route for displaying hello to a specific user
Route::get('users/{id}', [UserController::class, 'greetUserWithId']);

