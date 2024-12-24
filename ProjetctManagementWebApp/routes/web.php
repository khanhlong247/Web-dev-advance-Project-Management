<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Đặt route '/' gọi đến StudentController@index
Route::get('/', [StudentController::class, 'index']);

// Route khác (nếu cần)
Route::get('/students', [StudentController::class, 'index']);
