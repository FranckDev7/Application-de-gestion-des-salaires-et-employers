<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     * Cette méthode est utilisée pour créer la table 'employers' avec les colonnes spécifiées.
     */
    public function up(): void
    {
        // Crée la table 'employers'
        Schema::create('employers', function (Blueprint $table) {

            $table->id();  // Ajoute une colonne clé primaire auto-incrémentée nommée 'id'
            $table->string('nom');  // Ajoute une colonne chaîne de caractères nommée 'nom'
            $table->string('prenom');  // Ajoute une colonne chaîne de caractères nommée 'prenom'
            $table->string('email', 255); // Ajoute une colonne chaîne de caractères nommée 'email' avec une longueur maximale de 255 caractères
            $table->string('contact');  // Ajoute une colonne chaîne de caractères nommée 'contact'


            /**
             * Ajoute une colonne nommée 'departement_id' de type entier non signé qui stokera (les clés étrangères)
             * les clés étrangères sont des valeurs de la colonne id de la table 'departements'
             */
            $table->unsignedBigInteger('departement_id');

            /**
             * Définit 'id_departement' comme clé étrangère référencant 'id' dans la table 'departements'
             * Si un departement est supprimé, les enregistrements associés seront également supprimés
            */
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');

            $table->integer('montant_journalier')->nullable(); // Ajoute une colonne nommée 'montant_journalier' qui peut être nulle
            $table->timestamps(); // Ajoute les colonnes de timestamps 'created_at' et 'updated_at'
        });
    }

    /**
     * Annule les migrations.
     * Cette méthode est utilisée pour supprimer la table 'employers' si elle existe.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers'); // Supprimer la table 'employers'
    }
};
