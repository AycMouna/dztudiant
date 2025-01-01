<?php

namespace App\Http\Controllers;

use App\Models\ProjectTracking;
use Illuminate\Http\Request;

class ProjectTrackingController extends Controller
{
    // Liste toutes les étapes du suivi pour un projet
    public function index($projectId)
    {
        $trackingSteps = ProjectTracking::where('project_id', $projectId)->orderBy('created_at', 'asc')->get();
        return response()->json($trackingSteps);
    }

    // Ajoute une nouvelle étape de suivi
    public function store(Request $request)
    {
        $tracking = ProjectTracking::create($request->all());
        return response()->json($tracking, 201);
    }

    // Affiche une étape spécifique du suivi
    public function show($id)
    {
        $tracking = ProjectTracking::findOrFail($id);
        return response()->json($tracking);
    }

    // Met à jour une étape du suivi
    public function update(Request $request, $id)
    {
        $tracking = ProjectTracking::findOrFail($id);
        $tracking->update($request->all());
        return response()->json($tracking);
    }

    // Supprime une étape du suivi
    public function destroy($id)
    {
        ProjectTracking::destroy($id);
        return response()->json(['message' => 'Project tracking step deleted successfully.']);
    }
}
