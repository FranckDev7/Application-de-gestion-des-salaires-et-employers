<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController;


Route::get('/', [AuthController::class, 'login'])->name('login'); // Route pour afficher la page de connexion
Route::post('/', [AuthController::class, 'handlelogin'])->name('handleLogin'); // Route pour gérer la soumission du formulaire de connexion

/**
 * Routes protégées par le middleware d'authentification
 */
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AppController::class, 'index'])->name('dashboard'); // Route pour afficher le tableau de bord

    // Groupe des routes pour les employers
    Route::prefix('employers')->group(function () {
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index'); // Route pour afficher la liste des employeurs
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create'); // Route pour afficher le formulaire de création d'un nouvel employeur
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit'); // Route pour afficher le formulaire de modification d'un employeur existant
    });

    // Groupe des routes pour les departements
    Route::prefix('departements')->group(function () {
        Route::get('/', [DepartementController::class, 'index'])->name('departement.index'); // Route pour afficher la liste de departements
        Route::get('/create', [DepartementController::class, 'create'])->name('departement.create'); // Route pour afficher le formulaire de création d'un nouveau departement
        Route::post('/create', [DepartementController::class, 'store'])->name('departement.store'); // Route pour soumettre le formulaire de création d'un nouveau departement
        Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit'); // Route pour afficher le formulaire de modification d'un departement existant
        Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update'); // Route pour mettre à jour les modifications d'un departement existant
        Route::get('/{departement}', [DepartementController::class, 'delete'])->name('departement.delete'); // Route pour supprimer un departement par son ID
    });

});
