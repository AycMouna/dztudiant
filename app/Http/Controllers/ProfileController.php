<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Affiche le profil d'un utilisateur
    public function show($userId)
    {
        $profile = Profile::where('user_id', $userId)->firstOrFail();
        return response()->json($profile);
    }

    // Met à jour le profil d'un utilisateur
    public function update(Request $request, $userId)
    {
        $profile = Profile::where('user_id', $userId)->firstOrFail();
        $profile->update($request->all());
        return response()->json($profile);
    }
}
