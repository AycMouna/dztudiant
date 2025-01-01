<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'status'];

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec Application
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // Relation avec Team
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
