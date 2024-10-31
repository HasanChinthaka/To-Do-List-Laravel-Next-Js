<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $tasks = Task::where('user_id', Auth::id())->get();
    return view('dashboard', compact('tasks'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/add-new-task',[TaskController::class, 'add_task'])->name('add_task');

Route::post('/add-new-task', [TaskController::class, 'store'])->name('save_task');
Route::put('/task-complete', [TaskController::class, 'update_status'])->name('update_task_status');

require __DIR__.'/auth.php';
