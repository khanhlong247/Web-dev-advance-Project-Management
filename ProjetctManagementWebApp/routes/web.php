<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('Student');
});

Route::get('/student', [StudentController::class, 'index'])->name('student');
