<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    /**
     * Affiche la vue de connexion.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        // Retourne la vue 'auth.login'
        return view('auth.login');
    }

    /**
     * Gère la soumission du formulaire de connexion.
     *
     * @param AuthRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleLogin(AuthRequest $request)
    {
        // Récupère les identifiants de connexion (email et mot de passe) depuis la requête
        $credentials = $request->only(['email', 'password']);

        // Tente de connecter l'utilisateur avec les identifiants fournis
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard'); // Redirige vers le tableau de bord si la connexion est réussie
        } else {
            // Redirige vers la page précédente avec les données saisies et un message d'erreur si la connexion échoue
            return redirect()->back()->withInput($request->only('email'))->with('error_msg', 'Informations d\'identification incorrectes.');
        }
    }
}
