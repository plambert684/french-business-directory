<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unites_legales', function (Blueprint $table) {
            $table->id();

            // Identifiant
            $table->string('siren', 9)->index();

            // Diffusion et purge
            $table->string('statut_diffusion_unite_legale')->nullable();
            $table->string('unite_purgee_unite_legale')->nullable();

            // Dates de création et de traitement
            $table->date('date_creation_unite_legale')->nullable();
            $table->dateTime('date_dernier_traitement_unite_legale')->nullable();
            $table->date('date_debut')->nullable();

            // Identité physique
            $table->string('sigle_unite_legale')->nullable();
            $table->string('sexe_unite_legale', 1)->nullable();
            $table->string('prenom_1_unite_legale')->nullable();
            $table->string('prenom_2_unite_legale')->nullable();
            $table->string('prenom_3_unite_legale')->nullable();
            $table->string('prenom_4_unite_legale')->nullable();
            $table->string('prenom_usuel_unite_legale')->nullable();
            $table->string('pseudonyme_unite_legale')->nullable();
            $table->string('nom_unite_legale')->nullable();
            $table->string('nom_usage_unite_legale')->nullable();

            // Identité morale
            $table->string('denomination_unite_legale')->nullable();
            $table->string('denomination_usuelle_1_unite_legale')->nullable();
            $table->string('denomination_usuelle_2_unite_legale')->nullable();
            $table->string('denomination_usuelle_3_unite_legale')->nullable();
            $table->string('identifiant_association_unite_legale')->nullable();

            // Effectifs et Catégories
            $table->string('tranche_effectifs_unite_legale')->nullable();
            $table->integer('annee_effectifs_unite_legale')->nullable();
            $table->string('categorie_entreprise')->nullable();
            $table->integer('annee_categorie_entreprise')->nullable();

            // Informations juridiques et administratives
            $table->integer('nombre_periodes_unite_legale')->default(1);
            $table->string('etat_administratif_unite_legale', 1)->nullable();
            $table->string('categorie_juridique_unite_legale', 4)->nullable();
            $table->string('nic_siege_unite_legale', 5)->nullable();

            // Code NAF
            $table->string('activite_principale_unite_legale', 6)->nullable();
            $table->string('nomenclature_activite_principale_unite_legale')->nullable();
            $table->string('activite_principale_naf_25_unite_legale', 6)->nullable();

            $table->string('economie_sociale_solidaire_unite_legale', 1)->nullable();
            $table->string('societe_mission_unite_legale', 1)->nullable();
            $table->string('caractere_employeur_unite_legale', 1)->nullable();

            $table->timestamps();

            $table->index('nom_unite_legale');
            $table->index('denomination_unite_legale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unite_legal');
    }
};
