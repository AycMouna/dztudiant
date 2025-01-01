<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Liste toutes les candidatures pour un projet
    public function index($projectId)
    {
        $applications = Application::where('project_id', $projectId)->get();
        return response()->json($applications);
    }

    // Soumettre une candidature
    public function store(Request $request)
    {
        $application = Application::create($request->all());
        return response()->json($application, 201);
    }

    // Mettre à jour le statut d'une candidature
    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->update($request->all());
        return response()->json($application);
    }

    // Supprimer une candidature
    public function destroy($id)
    {
        Application::destroy($id);
        return response()->json(['message' => 'Application deleted successfully.']);
    }
}
