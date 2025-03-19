<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\PomodoroController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Dashboard (User must be logged in)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');

    // Task CRUD Routes
    Route::resource('tasks', TaskController::class);

    // Pomodoro Timer
    Route::get('/pomodoro', [PomodoroController::class, 'index'])->name('pomodoro.index');
});
