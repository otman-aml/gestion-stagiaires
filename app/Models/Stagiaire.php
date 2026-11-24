<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stagiaire extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const STATUT_A_VENIR = 'À venir';
    public const STATUT_EN_COURS = 'En cours';
    public const STATUT_TERMINE = 'Terminé';

    protected $fillable = [
        'nom',
        'prenom',
        'etablissement',
        'filiere',
        'date_debut',
        'date_fin',
        'sujet_stage',
        'encadrant_id',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
        ];
    }

    public function encadrant(): BelongsTo
    {
        return $this->belongsTo(Encadrant::class);
    }

    public function getNomCompletAttribute(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function getClasseBadgeStatutAttribute(): string
    {
        return match ($this->statut) {
            self::STATUT_EN_COURS => 'bg-blue-100 text-blue-800',
            self::STATUT_TERMINE => 'bg-green-100 text-green-800',
            default => 'bg-slate-100 text-slate-700',
        };
    }

    public static function statuts(): array
    {
        return [
            self::STATUT_A_VENIR,
            self::STATUT_EN_COURS,
            self::STATUT_TERMINE,
        ];
    }
}
