<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEncadrantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $encadrant = $this->route('encadrant');
        $encadrantId = $encadrant ? $encadrant->id : null;

        return [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'service' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('encadrants', 'email')->ignore($encadrantId),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'nom' => 'nom',
            'prenom' => 'prénom',
            'service' => 'service ou département',
            'email' => 'adresse e-mail professionnelle',
        ];
    }
}
