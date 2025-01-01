<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Liste les notifications d'un utilisateur
    public function index($userId)
    {
        $notifications = Notification::where('user_id', $userId)->get();
        return response()->json($notifications);
    }

    // Mettre à jour le statut d'une notification
    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update($request->all());
        return response()->json($notification);
    }
}
