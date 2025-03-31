<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Autorise toujours cette requête
        return true;
    }

    /**
     * Obtient les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Retourne les règles de validation pour les champs 'email' et 'password'
        return [
            'email' => 'required|email', // Le champ email est requis et doit être un email valide
            'password' => 'required', // Le champ password est requis
        ];
    }

    /**
     * Obtient les messages de validation personnalisés.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        // Retourne les messages de validation personnalisés pour les champs 'email' et 'password'
        return [
            'email.required' => 'Le mail est requis', // Message lorsque le champ email est requis
            'email.email' => 'Mauvais format du mail', // Message lorsque le champ email n'a pas un format valide
            'password.required' => 'Mot de passe requis', // Message lorsque le champ password est requis
        ];
    }
}
