<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAdminRequest;
use App\Http\Requests\updateAdminRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function create ()
    {
        return view('admin.create');
    }

    public function edit (User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public fuction store (storeAdminRequest $request)
    {
        try {



        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de l\'enregistrement de l\'administrateur : ' . $e->getMessage());
            return redirect()->route('configurations.create')->withInput()->with('error_message', 'Une erreur est survenue lors de l\'enregistrement de l\'administrateur');
        }
    }

    public function update (updateAdminRequest $request)
    {
        try {
            //code...
        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de la mise à jour des informations de l\'administrateur : ' . $e->getMessage());
            return redirect()->route('configurations.create')->withInput()->with('error_message', 'Une erreur est survenue lors de la mise à jour des informations de l\'administrateur');
        }
    }
    public function delete (User $user)
    {
        try {
            //code...
        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de la suppression du compte de l\'administrateur : ' . $e->getMessage());
            return redirect()->route('configurations.create')->withInput()->with('error_message', 'Une erreur est survenue lors de la suppression du compte de l\'administrateur');
        }
    }


}
