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
        $projects = Project::all();
        $task = Task::all();
        return Inertia::render('Dashboard', ['projects' => $projects]);
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

        DB::transaction(function () use ($validatedData) {
            // Assuming you have a Task model and it has a fillable property set up correctly
            $task = Task::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'created_at' => $validatedData['dateCreated'],
                'date_completed' => $validatedData['dateCompleted'],
            ]);

            // If the task is associated with a project, you can handle that relationship here
            if (isset($validatedData['project']['id'])) {
                $task->project()->associate($validatedData['project']['id']);
                $task->save();
            }
        });

        return redirect()->route('tasks')->with('success', 'Task created successfully!');
    }
}
