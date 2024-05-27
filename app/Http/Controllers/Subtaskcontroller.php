<?php

// app/Http/Controllers/SubtaskController.php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Models\Task;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $task->subtasks()->create($request->all());

        return redirect()->route('tasks.show', $task)
                         ->with('success', 'Subtask created successfully.');
    }

    public function update(Request $request, Task $task, Subtask $subtask)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $subtask->update($request->all());

        return redirect()->route('tasks.show', $task)
                         ->with('success', 'Subtask updated successfully.');
    }

    public function destroy(Task $task, Subtask $subtask)
    {
        $subtask->delete();

        return redirect()->route('tasks.show', $task)
                         ->with('success', 'Subtask deleted successfully.');
    }
}
