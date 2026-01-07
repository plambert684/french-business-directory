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

            $table->string('siren', 9)->index();
            $table->string('nic', 5);
            $table->string('siret', 14)->index();

            $table->date('date_fin')->nullable();
            $table->date('date_debut')->nullable();

            $table->string('etat_administratif_etablissement', 4)->nullable();
            $table->boolean('changement_etat_administratif_etablissement')->default(false);

            $table->string('enseigne_1_etablissement')->nullable();
            $table->string('enseigne_2_etablissement')->nullable();
            $table->string('enseigne_3_etablissement')->nullable();
            $table->boolean('changement_enseigne_etablissement')->default(false);

            $table->string('denomination_usuelle_etablissement')->nullable();
            $table->boolean('changement_denomination_usuelle_etablissement')->default(false);

            $table->string('activite_principale_etablissement', 7)->nullable();
            $table->string('nomenclature_activite_principale_etablissement')->nullable();
            $table->boolean('changement_activite_principale_etablissement')->default(false);

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
