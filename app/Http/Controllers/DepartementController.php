<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementRequest;
use Exception;
use Illuminate\Http\Request;
use App\Models\Departement;

class DepartementController extends Controller
{
    public function index ()
    {
        $departements = Departement::paginate(1);
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

    public function store (Departement $departement, saveDepartementRequest $request)
    {
      try {

        $departement->name = $request->name;
        $departement->save();
        return redirect()->route('departement.index')->with('success_message', 'Departement enregistré');

      } catch (Exception $e) {
        dd($e);
      }
    }



}

