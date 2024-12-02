<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = \App\Models\Project::all(); // Fetch all projects
        return response()->json($projects);
    }
    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'sometimes|string',
        ]);
    
        $project = \App\Models\Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? '',
        ]);
    
        return response()->json(['message' => 'Project created successfully', 'project' => $project], 201);
    }

}
