<?php

use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

// Entry point to our project
Route::get('/', [StudentController::class, 'index']);

// Load view for adding new student
Route::get('students/create',[StudentController::class, 'loadAddForm']);

// Route for adding a new student
Route::post('create', [StudentController::class, 'create'])->name('students.add');

// Route for editing student
Route::get('students/{id}/edit', [StudentController::class, 'loadUpdateStudentForm'])->name('students.edit');

// Route for handling edit student data
Route::post('students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::post('students/{id}/delete', [StudentController::class, 'destroy'])->name('students.delete');