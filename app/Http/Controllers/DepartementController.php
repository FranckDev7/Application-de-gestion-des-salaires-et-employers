<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementRequest;
use Exception;
use Illuminate\Http\Request;
use App\Models\Departement;
use Illuminate\Support\Facades\Log;

class DepartementController extends Controller
{
    public function index ()
    {
        $departements = Departement::paginate(4);
        return view('departements.index', compact('departements'));
    }
    public function create ()
    {
        return view('departements.create');
    }
    public function edit (Departement $departement)
    {
        return view('departements.edit', compact('departement'));
    }


    public function store(Departement $departement, saveDepartementRequest $request)
    {
        try {

            $departement->name = $request->name; // Assigner le nom du département à partir de la requête
            $departement->save();  // Sauvegarder le département dans la base de données

            // Rediriger vers la page d'index des départements avec un message de succès
            return redirect()->route('departement.index')->with('success_message', 'Département enregistré avec succès');

        } catch (Exception $e) {
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de l\'enregistrement du département : ' . $e->getMessage());
            return redirect()->route('departement.index')->with('error_message', 'Une erreur est survenue lors de l\'enregistrement du département.');
        }
    }
    public function update(Departement $departement, saveDepartementRequest $request)
    {
        try {

            $departement->name = $request->name; // Assigner le nom du département à partir de la requête
            $departement->update();  // Sauvegarder le département dans la base de données

            // Rediriger vers la page d'index des départements avec un message de succès
            return redirect()->route('departement.index')->with('success_message', 'Département mis à jour');

        } catch (Exception $e) {
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de l\'enregistrement du département : ' . $e->getMessage());
            return redirect()->route('departement.index')->with('error_message', 'Une erreur est survenue lors de la mise à jour du département.');
        }
    }
    public function delete(Departement $departement)
    {
        try {

            $departement->delete();  // Supprime le département dans la base de données

            // Rediriger vers la page d'index des départements avec un message de succès
            return redirect()->route('departement.index')->with('success_message', 'Département supprimé avec succès');

        } catch (Exception $e) {
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de l\'enregistrement du département : ' . $e->getMessage());
            return redirect()->route('departement.index')->with('error_message', 'Une erreur est survenue lors de la suppression du département.');
        }
    }



}

