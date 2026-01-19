<?php

    use Illuminate\Support\Facades\Route;

    Route::middleware('throttle:api')->group(function () {

        /*
 * Tokens Endpoint
 */
        Route::post('tokens/create', [App\Http\Controllers\TokensController::class, 'store']);

        /*
         * Etablissements Endpoint
         */
        Route::get('etablissements/siren/{siren}', [App\Http\Controllers\EtablissementsController::class, 'index'])
            ->where('siren', '^[0-9]{9}$')
            ->middleware(['auth:sanctum', 'abilities:get-establishments']);

        Route::get('etablissements/search/{siret}', [App\Http\Controllers\EtablissementsController::class, 'show'])
            ->where('siret', '^[0-9]{14}$')
            ->middleware(['auth:sanctum', 'abilities:get-establishments']);

        /*
         * Entreprise Endpoint
         */
        Route::get('entreprises/siren/{siren}', [App\Http\Controllers\UnitesLegalesController::class, 'index'])
            ->where('siren', '^[0-9]{9}$')
            ->middleware(['auth:sanctum', 'abilities:get-legal-units']);

        Route::get('entreprises/search/{name}', [App\Http\Controllers\UnitesLegalesController::class, 'index'])
            ->where('name', "^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s'.,&-]{2,100}$")
            ->middleware(['auth:sanctum', 'abilities:get-legal-units']);

    });

