<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Support\Facades\Log;

class EmployerController extends Controller
{
    /**
     * Affiche une liste paginée des employeurs.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupère une liste paginée de 5 employeurs
        $employers = Employer::with('departement')->paginate(5);
        // Retourne la vue 'employers.index' avec la liste des employeurs
        return view('employers.index', compact('employers'));
    }

    /**
     * Affiche le formulaire de création d'un nouvel employeur.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Récupère tous les départements
        $departements = Departement::all();
        // Retourne la vue 'employers.create' avec la liste des départements
        return view('employers.create', compact('departements'));
    }

    /**
     * Affiche le formulaire d'édition d'un employeur existant.
     * @param \App\Models\Employer $employer
     * @return \Illuminate\View\View
     */
    public function edit(Employer $employer)
    {
        // Récupère tous les départements
        $departements = Departement::all();

        // Retourne la vue 'employers.edit' avec l'employeur à éditer
        return view('employers.edit', compact('employer', 'departements'));
    }

    /**
     * Enregistre un nouvel employeur dans la base de données.
     * @param \App\Http\Requests\StoreEmployeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEmployeRequest $request)
    {
        try {
            // Crée l'employé avec les données validées
            $query = Employer::create($request->validated());

            // Vérifie si la création a réussi
            if ($query) {
                // Redirige vers la liste des employeurs avec un message de succès
                return to_route('employer.index')->with('success_message', 'Employer ajouté avec succès');
            } else {
                // Retourne en arrière avec un message d'erreur
                return back()->with('error_message', 'Une erreur est survenue lors de l\'ajout de l\'employé.');
            }
        } catch (\Exception $e) {
            // En cas d'exception, retourne avec un message d'erreur
            return back()->with('error_message', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        try {
            // Mise à jour des données validées
            $employer->update($request->validated());

            return to_route('employer.index')->with('success_message', 'Les informations de l\'employé ont été mises à jour');
        } catch (\Exception $e) {

            // Enregistrement de l'erreur dans les logs
            Log::error('Erreur lors de la mise à jour de l\'employé : ' . $e->getMessage());
            return back()->with('error_message', 'Une erreur est survenue, veuillez réessayer.');
        }
    }


    /**
     * Supprime un employé spécifié de la base de données.
     *
     * @param \App\Models\Employer $employer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete (Employer $employer)
    {
        try {
            // Supprime l'employé de la base de données
            $employer->delete();

            // Redirige vers la liste des employeurs avec un message de succès
            return to_route('employer.index')->with('success_message', 'Employer supprimé avec succès');

        } catch (\Exception $e) {

            // Enregistrement de l'erreur dans les logs
            Log::error('Erreur lors de la suppression de l\'employé : ' . $e->getMessage());
            // En cas d'exception, retourne avec un message d'erreur
            return back()->with('error_message', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }



}
