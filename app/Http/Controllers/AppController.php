<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use App\Models\Configuration;
use Carbon\Carbon;


class AppController extends Controller
{
    /**
     * Affiche le tableau de bord avec les totaux des départements, des employeurs et des administrateurs.
     *
     * @return \Illuminate\View\View
     */
    public function index ()
    {
        // Configuration de Carbon en français
        Carbon::setLocale('fr');

        // Récupération des totaux
        $totalDepartements = Departement::all()->count(); // Compte le nombre total de départements
        $totalEmployers = Employer::all()->count(); // Compte le nombre total d'employeurs
        $totalAdministrateurs = User::all()->count();  // Compte le nombre total d'administrateurs

        $defaultPaymentDate = null;
        $paymentNotification = "";
        $currentDate = Carbon::now()->day;

        // Récupération du premier enregistrement dans la colonne 'type' ayant comme valeur 'PAYMENT_DATE'
        $defaultPaymentDateQuery = Configuration::where('type', 'PAYMENT_DATE')->first();

        if ($defaultPaymentDateQuery) {
            // Recuperation de la valeur de la colonne 'value'
            $defaultPaymentDate = $defaultPaymentDateQuery->value;
            $convertedPaymentDate = intval($defaultPaymentDate);

            if ($currentDate < $convertedPaymentDate) {
                $paymentNotification = "Le paiement doit avoir lieu le {$defaultPaymentDate} de ce mois.";
            } else {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = ucfirst($nextMonth->translatedFormat('F')); // Mois en français
                $paymentNotification = "Le paiement doit avoir lieu le {$defaultPaymentDate} du mois de {$nextMonthName}";
            }


        }

        // Retourne la vue du tableau de bord avec les variables
        return view('dashboard', compact('totalDepartements', 'totalEmployers', 'totalAdministrateurs', 'paymentNotification'));




    }
}
























































































