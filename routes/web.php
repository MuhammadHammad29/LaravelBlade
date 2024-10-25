<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.web');
});

/*
Route::get('/post', function () {
    return view('post');
});

route::view(view ka naam,route ka naam) oopar wala kaam 1 line main*/

//Route::middleware('auth')->view('post','/post');

Route::middleware('auth')->name('student.')->prefix('student')->group(function() {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('create', [StudentController::class, 'create'])->name('create');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::post('update', [StudentController::class, 'update'])->name('update');
    Route::get('destroy/{id}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->name('course.')->prefix('course')->group(function() {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('create', [CourseController::class, 'create'])->name('create');
    Route::post('store', [CourseController::class, 'store'])->name('store');
});


//Route::get('/post/first', function () {
//    return view('firstpost');
//}); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
