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

            // Dates
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();

            // État administratif
            $table->string('etat_administratif', 1)->nullable();
            $table->boolean('changement_etat_admin')->default(false);

            // Enseignes
            $table->string('enseigne_1')->nullable();
            $table->string('enseigne_2')->nullable();
            $table->string('enseigne_3')->nullable();
            $table->boolean('changement_enseigne')->default(false);

            // Dénomination
            $table->string('denomination_usuelle')->nullable();
            $table->boolean('changement_denomination_usuelle')->default(false);

            // Activité (Code NAF/APE)
            $table->string('activite_principale', 6)->nullable();
            $table->string('nomenclature_activite')->nullable();
            $table->boolean('changement_activite_principale')->default(false);

            // Employeur
            $table->string('caractere_employeur', 1)->nullable();
            $table->boolean('changement_caractere_employeur')->default(false);

            $table->timestamps();

            // Index composite pour optimiser la recherche par date sur un SIRET précis
            $table->index(['siret', 'date_debut']);
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
