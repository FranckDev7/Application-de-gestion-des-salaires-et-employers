<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;


class AppController extends Controller
{
    public function index ()
    {
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdministrateurs = User::all()->count();
        return view('dashboard', compact('totalDepartements', 'totalEmployers', 'totalAdministrateurs'));
    }
}
























































































