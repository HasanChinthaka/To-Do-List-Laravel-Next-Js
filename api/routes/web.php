<?php

use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Admin_Message;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $tasks = Task::where('user_id', Auth::id())->get();
    $msgs = Admin_Message::where('is_read', 0)
        ->where('user_id', Auth::id())
        ->get();
    $message_count = $msgs->count();    
    return view('dashboard', compact('tasks', 'msgs', 'message_count'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/task-list', [TaskController::class, 'index'])->name('add_task');
Route::get('/add-new-task', [TaskController::class, 'add_task'])->name('add_task');

Route::post('/add-new-task', [TaskController::class, 'store'])->name('save_task');
Route::put('/task-complete', [TaskController::class, 'update_status'])->name('update_task_status');

Route::get('/edit-task/{id}',  [TaskController::class, 'edit_task'])->name('edit_task');
Route::put('/edit-task/{id}', [TaskController::class, 'update_task'])->name('update_task');
Route::delete('/task-delete', [TaskController::class, 'destroy'])->name('delete_task');

Route::get('/send-messages', [AdminMessageController::class, 'index'])->name('admin_msg');
Route::post('/send-messages', [AdminMessageController::class, 'send_message'])->name('send_message');

Route::get('/admin-messages', [AdminMessageController::class, 'show_messages'])->name('show_msgs');
Route::get('/admin-messages/{id}/{title}', [AdminMessageController::class, 'read_message'])->name('show_msg');
Route::get('/admin-messages/mark-as-all-read', [AdminMessageController::class, 'mark_as_all_read'])->name('all_read');

require __DIR__ . '/auth.php';
