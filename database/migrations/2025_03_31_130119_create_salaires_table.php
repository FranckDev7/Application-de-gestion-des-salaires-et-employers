<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     * Cette méthode est utilisée pour créer la table 'salaires' avec les colonnes spécifiées.
     */
    public function up(): void
    {
        // Créer la table 'salaires'
        Schema::create('salaires', function (Blueprint $table) {

            $table->id(); // Ajoute une colonne clé primaire auto-incrémentée nommée 'id'

            /**
             * Ajoute une colonne 'employer_id' de type entier non signé qui stokera (les clés étrangères)
             * les clés étrangères sont des valeurs de la colonne id de la table 'employers'
             */
            $table->unsignedBigInteger('employer_id');

            /**
             * Définit 'employer_id' comme clé étrangère référencant 'id' dans la table 'employers'
             * Si un employer est supprimé, les enregistrements associés seront également supprimés
             */
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');

            $table->integer('montant')->nullable(); // Ajoute une colonne entière nommée 'montant' qui peut être nulle
            $table->timestamps(); // Ajoute les colonnes de timestamps 'created_at' et 'updated_at'
        });
    }

    /**
     * Annule les migrations.
     * Cette méthode est utilisée pour supprimer la table 'salaires' si elle existe.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaires'); // Supprimer la table 'salaires'
    }
};
