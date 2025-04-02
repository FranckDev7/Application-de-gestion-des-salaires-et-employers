<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;


class AppController extends Controller
{
    /**
     * Affiche le tableau de bord avec les totaux des départements, des employeurs et des administrateurs.
     *
     * @return \Illuminate\View\View
     */
    public function index ()
    {

        $totalDepartements = Departement::all()->count(); // Compte le nombre total de départements

        $totalEmployers = Employer::all()->count(); // Compte le nombre total d'employeurs

        $totalAdministrateurs = User::all()->count();  // Compte le nombre total d'administrateurs

        // Retourne la vue du tableau de bord avec les totaux
        return view('dashboard', compact('totalDepartements', 'totalEmployers', 'totalAdministrateurs'));
    }
}
























































































