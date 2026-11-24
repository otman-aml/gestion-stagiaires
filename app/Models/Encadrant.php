<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encadrant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'service',
        'email',
    ];

    public function stagiaires(): HasMany
    {
        return $this->hasMany(Stagiaire::class);
    }

    public function getNomCompletAttribute(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }
}
