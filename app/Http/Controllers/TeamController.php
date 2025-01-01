<?php
namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Liste toutes les équipes
    public function index()
    {
        $teams = Team::all();
        return response()->json($teams);
    }

    // Affiche une équipe spécifique
    public function show($id)
    {
        $team = Team::findOrFail($id);
        return response()->json($team);
    }

    // Crée une nouvelle équipe
    public function store(Request $request)
    {
        $team = Team::create($request->all());
        return response()->json($team, 201);
    }

    // Met à jour une équipe
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->update($request->all());
        return response()->json($team);
    }

    // Supprime une équipe
    public function destroy($id)
    {
        Team::destroy($id);
        return response()->json(['message' => 'Team deleted successfully.']);
    }
}

