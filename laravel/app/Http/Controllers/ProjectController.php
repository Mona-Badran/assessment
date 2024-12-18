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

    public function show($id){
        $project = \App\Models\Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }
    
        return response()->json($project);
    }
    public function update(Request $request, $id){
        $project = \App\Models\Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }
    
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);
    
        $project->update([
            'title' => $validated['title'] ?? $project->title,
            'description' => $validated['description'] ?? $project->description,
        ]);
    
        return response()->json(['message' => 'Project updated successfully', 'project' => $project]);
    }
    public function delete($id){
        $project = \App\Models\Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }
    
        $project->delete();
    
        return response()->json(['message' => 'Project deleted successfully']);
    }
}
