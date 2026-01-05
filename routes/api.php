<?php

    use Illuminate\Support\Facades\Route;

    Route::apiResource('etablissements', App\Http\Controllers\EtablissementsController::class);
    Route::apiResource('unites_legales', App\Http\Controllers\UnitesLegalesController::class);
