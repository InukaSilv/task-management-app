<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

// Redirect root URL to register or dashboard
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('tasks.dashboard')
        : redirect('/register');
});

// Task routes (protected by auth and email verification)
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Dashboard with stats
    Route::get('/task-dashboard', [TaskController::class, 'dashboard'])->name('tasks.dashboard');

    // CRUD routes for tasks
    Route::resource('tasks', TaskController::class)->except(['show']); // Generates tasks.create, tasks.edit, etc.
});
