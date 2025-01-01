<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Nom de la table (optionnel si le nom correspond au pluriel du modèle)
    protected $table = 'messages';

    // Champs modifiables en masse
    protected $fillable = [
        'sender_id',  // ID de l'expéditeur
        'receiver_id', // ID du destinataire
        'content',    // Contenu du message
        'created_at', // Date de création
        'updated_at', // Date de mise à jour
    ];

    // Relation avec l'utilisateur (expéditeur)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relation avec l'utilisateur (destinataire)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}

