<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'departement_id' => 'required|integer',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|unique:employers,email',
            'contact' => 'required|unique:employers,contact',
            'montant_journalier' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'departement_id.required' => 'Le champ département est obligatoire.',
            'departement_id.integer' => 'Le champ département doit être un entier.',
            'nom.required' => 'Le champ nom est obligatoire.',
            'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
            'prenom.required' => 'Le champ prenom est obligatoire.',
            'prenom.string' => 'Le champ prenom doit être une chaîne de caractères.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'contact.required' => 'Le champ contact est obligatoire.',
            'contact.unique' => 'Ce contact est déjà utilisé.',
            'montant_journalier.required' => 'Le champ montant journalier est obligatoire.',
        ];
    }
}
