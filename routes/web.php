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

// Jetstream's auth middleware group + custom route
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'), // Includes session handling
    'verified', // Requires email verification
])->group(function () {
    // Your custom dashboard route
    Route::get('/task-dashboard', [TaskController::class, 'dashboard'])
        ->name('tasks.dashboard');
});
