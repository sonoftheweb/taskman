<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title',
        ]);

        DB::transaction(function () use ($validated) {
            $project = new Project();
            $project->title = $validated['title'];
            $project->save();
        });

        return redirect()->back()->with('success', 'Project created successfully!');
    }
}
