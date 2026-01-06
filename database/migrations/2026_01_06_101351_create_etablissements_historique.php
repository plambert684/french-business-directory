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
        Schema::create('etablissements_historique', function (Blueprint $table) {
            $table->id();

            // Identifiants (0, 1, 2)
            $table->string('siren', 9)->index();
            $table->string('nic', 5);
            $table->string('siret', 14)->index();

            // Dates (3, 4)
            $table->date('date_fin')->nullable();
            $table->date('date_debut')->nullable();

            // État administratif (5, 6)
            $table->string('etat_administratif_etablissement', 4)->nullable();
            $table->boolean('changement_etat_administratif_etablissement')->default(false);

            // Enseignes (7, 8, 9, 10)
            $table->string('enseigne_1_etablissement')->nullable();
            $table->string('enseigne_2_etablissement')->nullable();
            $table->string('enseigne_3_etablissement')->nullable();
            $table->boolean('changement_enseigne_etablissement')->default(false);

            // Dénomination (11, 12)
            $table->string('denomination_usuelle_etablissement')->nullable();
            $table->boolean('changement_denomination_usuelle_etablissement')->default(false);

            // Activité NAF (13, 14, 15)
            $table->string('activite_principale_etablissement', 7)->nullable();
            $table->string('nomenclature_activite_principale_etablissement')->nullable();
            $table->boolean('changement_activite_principale_etablissement')->default(false);

            // Employeur (16, 17)
            $table->string('caractere_employeur_etablissement', 4)->nullable();
            $table->boolean('changement_caractere_employeur_etablissement')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements_historique');
    }
};
