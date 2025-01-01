<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relation avec User
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Relation avec Project
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
