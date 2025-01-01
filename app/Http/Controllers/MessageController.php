<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Liste tous les messages entre deux utilisateurs
    public function index($userId, $receiverId)
    {
        $messages = Message::where(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    // Envoie un message
    public function store(Request $request)
    {
        $message = Message::create($request->all());
        return response()->json($message, 201);
    }

    // Affiche un message spécifique
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return response()->json($message);
    }

    // Supprime un message
    public function destroy($id)
    {
        Message::destroy($id);
        return response()->json(['message' => 'Message deleted successfully.']);
    }
}
