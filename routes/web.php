<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

// POSTS (agar use kar rahi ho)
Route::resource('posts', PostController::class);

// STUDENTS CRUD
Route::resource('students', StudentController::class);