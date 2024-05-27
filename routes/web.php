<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubtaskController;

Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks.subtasks', SubtaskController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('/tasks/{taskId}/subtasks/{subtaskId}', [SubtaskController::class, 'update'])->name('subtasks.update');
