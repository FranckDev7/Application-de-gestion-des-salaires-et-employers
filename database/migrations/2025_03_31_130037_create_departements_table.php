<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     * Cette méthode est utilisée pour créer la table 'departements' avec les colonnes spécifiées.
     */
    public function up(): void
    {
        // Créer la table 'departements'
        Schema::create('departements', function (Blueprint $table) {

            $table->id(); // Ajouter une colonne clé primaire auto-incrémentée nommée 'id'
            $table->string('name', 255); // Ajouter une colonne chaîne de caractères nommée 'name' avec une longueur maximale de 255 caractères
            $table->timestamps(); // Ajouter les colonnes de timestamps 'created_at' et 'updated_at'
        });
    }

    /**
     * Annule les migrations.
     * Cette méthode est utilisée pour supprimer la table 'departements' si elle existe.
     */
    public function down(): void
    {
        Schema::dropIfExists('departements'); // Supprime la table 'departements'
    }
};
