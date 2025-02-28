<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\StakeholderController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes cho các module
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('milestones', MilestoneController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('risks', RiskController::class);

    // Route cho "My Tasks" của team_member
    Route::get('/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.my');

    // Stakeholder routes
    Route::prefix('stakeholder')->name('stakeholder.')->group(function () {
        Route::get('/dashboard', [StakeholderController::class, 'dashboard'])->name('dashboard');
        Route::get('/reports', [StakeholderController::class, 'reports'])->name('reports');
    });

    // Admin routes cho quản lý người dùng với prefix "admin." 
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class);
    });
});

require __DIR__.'/auth.php';
