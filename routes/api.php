<?php

    use App\Models\User;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Validation\ValidationException;

    /*
     * Tokens Endpoint
     */
    Route::post('tokens/create', [App\Http\Controllers\TokensController::class, 'store']);

    /*
     * Etablissements Endpoint
     */
    Route::get('etablissements/{siren}', [App\Http\Controllers\EtablissementsController::class, 'index'])
        ->where('siren', '^[0-9]{9}$')
        ->middleware(['auth:sanctum', 'abilities:check-status,get-establishments']);

    /*
     * Entreprise Endpoint
     */
    Route::get('entreprises/siren/{siren}', [App\Http\Controllers\UnitesLegalesController::class, 'index'])
        ->where('siren', '^[0-9]{9}$')
        ->middleware(['auth:sanctum', 'abilities:check-status,get-legal-units']);

    Route::get('entreprises/search/{name}', [App\Http\Controllers\UnitesLegalesController::class, 'index'])
        ->where('name', "^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s'.,&-]{2,100}$")
        ->middleware(['auth:sanctum', 'abilities:check-status,get-legal-units']);
