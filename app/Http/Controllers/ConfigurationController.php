<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeConfigRequest;
use App\Models\Configuration;
use Exception;
use Illuminate\Support\Facades\Log;

class ConfigurationController extends Controller
{
    public function index ()
    {
        $allConfigurations = Configuration::latest()->paginate(10);
        return view('config.index', compact('allConfigurations'));
    }

    public function create ()
    {
        return view('config.create');
    }

    public function store (storeConfigRequest $request)
    {
        try {

            // Crée la configuration avec les données validées
            Configuration::create($request->validated());
            return to_route('configurations')->with('success_message', 'Configuration ajoutée avec succès');
            
        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de l\'ajout de la configuration : ' . $e->getMessage());
            return redirect()->route('configurations.create')->withInput()->with('error_message', 'Une erreur est survenue lors de l\'ajout de la configuration.');
        }
    }
    public function delete (Configuration $configuration)
    {
        try {

            $configuration->delete();
            return to_route('configurations')->with('success_message', 'Configuration supprimée avec succès');

        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de la suppression de la configuration : ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error_message', 'Une erreur est survenue lors de la suppression de la configuration.');
        }
    }


}


