<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class TaskManager extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $projects = $currentUser->projects()->get();
        $tasks = $currentUser->tasks()->get();
        return Inertia::render('Dashboard', ['projects' => $projects, 'tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'dateCreated' => 'required|date',
            'dateToBeCompleted' => 'nullable|date',
            'dateCompleted' => 'nullable|date',
            'project' => 'nullable|array',
            'project.id' => 'nullable|integer|exists:projects,id',
            'project.title' => 'nullable|string|max:255',
        ]);

        // Assuming you have a Task model and it has a fillable property set up correctly
        $task = Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'date_to_be_completed' => $validatedData['dateToBeCompleted'],
            'author_id' => auth()->id(),
            'created_at' => $validatedData['dateCreated'],
            'project_id' => $validatedData['project']['id'] ?? null
        ]);

        return redirect()->route('tasks')->with('success', 'Task created successfully!');
    }
}
