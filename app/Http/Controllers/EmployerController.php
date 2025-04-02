<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Employer;


class EmployerController extends Controller
{
    /**
     * Affiche une liste paginée des employeurs.
     * @return \Illuminate\View\View
     */
    public function index ()
    {
        $employers = Employer::paginate(5);
        return view('employers.index', compact('employers'));
    }

    /**
     * Affiche le formulaire de création d'un nouvel employeur.
     * @return \Illuminate\View\View
     */
    public function create ()
    {
        $departements = Departement::all();
        return view('employers.create', compact('departements'));
    }

    /**
     * Affiche le formulaire d'édition d'un employeur existant.
     * @param \App\Models\Employer $employer
     * @return \Illuminate\View\View
     */
    public function edit (Employer $employer)
    {
        return view('employers.edit', compact('employer'));
    }

    public function store(StoreEmployeRequest $request)
    {
        try {
            // Créer l'employé avec les données validées
            $query = Employer::create($request->validated());

            // Vérifier si la création a réussi
            if ($query) {
                return to_route('employer.index')->with('success_message', 'Employer ajouté avec succès');
            } else {
                return back()->with('error_message', 'Une erreur est survenue lors de l\'ajout de l\'employé.');
            }
        } catch (\Exception $e) {
            // En cas d'exception, retournez avec un message d'erreur
            return back()->with('error_message', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }



}
