<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskManager;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    if (auth()->guest()) {
        return redirect()->route('login');
    }
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('/project', [ProjectController::class, 'store']);

    Route::get('/tasks', [TaskManager::class, 'index'])->name('tasks');
    Route::post('/tasks', [TaskManager::class, 'store'])->name('tasks.store');
});
