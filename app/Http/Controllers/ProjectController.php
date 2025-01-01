<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Liste tous les projets
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    // Affiche un projet spécifique
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    // Crée un nouveau projet
    public function store(Request $request)
    {
        $project = Project::create($request->all());
        return response()->json($project, 201);
    }

    // Met à jour un projet
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return response()->json($project);
    }

    // Supprime un projet
    public function destroy($id)
    {
        Project::destroy($id);
        return response()->json(['message' => 'Project deleted successfully.']);
    }
}
