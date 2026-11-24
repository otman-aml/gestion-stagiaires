<?php

namespace App\Http\Requests;

use App\Models\Stagiaire;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStagiaireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'etablissement' => ['required', 'string', 'max:255'],
            'filiere' => ['required', 'string', 'max:255'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after:date_debut'],
            'sujet_stage' => ['required', 'string'],
            'encadrant_id' => ['required', 'exists:encadrants,id'],
            'statut' => ['required', Rule::in(Stagiaire::statuts())],
        ];
    }

    public function attributes(): array
    {
        return [
            'nom' => 'nom',
            'prenom' => 'prénom',
            'etablissement' => 'établissement',
            'filiere' => 'filière',
            'date_debut' => 'date de début',
            'date_fin' => 'date de fin',
            'sujet_stage' => 'sujet de stage',
            'encadrant_id' => 'encadrant',
            'statut' => 'statut',
        ];
    }

    public function messages(): array
    {
        return [
            'date_fin.after' => 'La date de fin doit être postérieure à la date de début.',
        ];
    }
}
