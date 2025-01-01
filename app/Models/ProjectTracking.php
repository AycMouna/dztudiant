<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTracking extends Model
{
    use HasFactory;

    // Nom de la table (optionnel si le nom correspond au pluriel du modèle)
    protected $table = 'project_trackings';

    // Champs modifiables en masse
    protected $fillable = [
        'project_id',      // ID du projet
        'status',          // Statut du projet (en cours, terminé, etc.)
        'progress',        // Pourcentage de progression
        'updated_at',      // Dernière mise à jour
        'created_at',      // Date de création
    ];

    // Relation avec le projet
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
