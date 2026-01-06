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

            // 0: siren
            $table->string('siren', 9)->index();

            // 1: statutDiffusionUniteLegale
            $table->string('statut_diffusion_unite_legale')->nullable();

            // 2: unitePurgeeUniteLegale
            $table->string('unite_purgee_unite_legale')->nullable();

            // 3: dateCreationUniteLegale
            $table->date('date_creation_unite_legale')->nullable();

            // 4: sigleUniteLegale
            $table->string('sigle_unite_legale')->nullable();

            // 5: sexeUniteLegale (Augmenté à 4 pour gérer [ND])
            $table->string('sexe_unite_legale', 4)->nullable();

            // 6, 7, 8, 9: prenoms
            $table->string('prenom_1_unite_legale')->nullable();
            $table->string('prenom_2_unite_legale')->nullable();
            $table->string('prenom_3_unite_legale')->nullable();
            $table->string('prenom_4_unite_legale')->nullable();

            // 10: prenomUsuelUniteLegale
            $table->string('prenom_usuel_unite_legale')->nullable();

            // 11: pseudonymeUniteLegale
            $table->string('pseudonyme_unite_legale')->nullable();

            // 12: identifiantAssociationUniteLegale
            $table->string('identifiant_association_unite_legale')->nullable();

            // 13: trancheEffectifsUniteLegale
            $table->string('tranche_effectifs_unite_legale')->nullable();

            // 14: anneeEffectifsUniteLegale
            $table->integer('annee_effectifs_unite_legale')->nullable();

            // 15: dateDernierTraitementUniteLegale
            $table->dateTime('date_dernier_traitement_unite_legale')->nullable();

            // 16: nombrePeriodesUniteLegale
            $table->integer('nombre_periodes_unite_legale')->default(1);

            // 17: categorieEntreprise
            $table->string('categorie_entreprise')->nullable();

            // 18: anneeCategorieEntreprise
            $table->integer('annee_categorie_entreprise')->nullable();

            // 19: dateDebut
            $table->date('date_debut')->nullable();

            // 20: etatAdministratifUniteLegale (Augmenté à 4 pour [ND])
            $table->string('etat_administratif_unite_legale', 4)->nullable();

            // 21: nomUniteLegale
            $table->string('nom_unite_legale')->nullable()->index();

            // 22: nomUsageUniteLegale
            $table->string('nom_usage_unite_legale')->nullable();

            // 23: denominationUniteLegale
            $table->string('denomination_unite_legale')->nullable()->index();

            // 24, 25, 26: denominationsUsuelles
            $table->string('denomination_usuelle_1_unite_legale')->nullable();
            $table->string('denomination_usuelle_2_unite_legale')->nullable();
            $table->string('denomination_usuelle_3_unite_legale')->nullable();

            // 27: categorieJuridiqueUniteLegale
            $table->string('categorie_juridique_unite_legale', 4)->nullable();

            // 28: activitePrincipaleUniteLegale
            $table->string('activite_principale_unite_legale', 6)->nullable();

            // 29: nomenclatureActivitePrincipaleUniteLegale
            $table->string('nomenclature_activite_principale_unite_legale')->nullable();

            // 30: nicSiegeUniteLegale
            $table->string('nic_siege_unite_legale', 5)->nullable();

            // 31: economieSocialeSolidaireUniteLegale
            $table->string('economie_sociale_solidaire_unite_legale', 4)->nullable();

            // 32: societeMissionUniteLegale
            $table->string('societe_mission_unite_legale', 4)->nullable();

            // 33: caractereEmployeurUniteLegale
            $table->string('caractere_employeur_unite_legale', 4)->nullable();

            // 34: activitePrincipaleNAF25UniteLegale
            $table->string('activite_principale_naf_25_unite_legale', 6)->nullable();

            $table->timestamps();
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
