<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function add_task() {
        return view('addtask');
    }

    public function store(Request $request) {
        $task = new Task();
        $task->user_id = Auth::id();
        $task->title = $request->task_title;
        $task->description = $request->task_discription;
        $task->date = $request->date;
        $task->time = $request->time;
        $task->save();

        return redirect()->route('dashboard')->with('success', 'Successfully added task !');
    }

    public function update_status(Request $request) {
        $task = Task::find($request->task_id);
        $task->is_completed = 1;
        // dd($task);
        $task->save();

        return redirect()->route('dashboard')->with('success', 'Successfully update task !');
    }
}
