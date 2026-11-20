<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [TaskController::class, 'welcome'])
    ->name('home');

Route::get('/tasks', [TaskController::class, 'index'])
    ->name('tasks.index');

Route::get('/profile', [TaskController::class, 'profile'])
    ->name('profile');

Route::get('/about', [TaskController::class, 'about'])
    ->name('about');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware('auth')
    ->name('dashboard');

// Protected routes
Route::middleware('auth')->group(function () {
    // Task management
    Route::get('/tasks/create', [TaskController::class, 'create'])
        ->name('tasks.create');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit');

    Route::patch('/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');

    // Breeze profile settings
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Public task details
Route::get('/tasks/{task}', [TaskController::class, 'show'])
    ->name('tasks.show');

require __DIR__.'/auth.php';