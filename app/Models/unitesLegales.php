<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unitesLegales extends Model
{
    protected $table = 'unites_legales';

    protected $fillable = [
        'siren',
        'denomination',
        'sigle',
        'prenom_1',
        'prenom_2',
        'prenom_3',
        'nom',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        'etat_administratif',
        'date_creation',
        'categorie_juridique',
        'activite_principale',
        'nomenclature_activite',
        'caractere_employeur',
    ];

    public static function searchBySiren($siren)
    {
        return self::where('siren', $siren)->get();
    }
}
