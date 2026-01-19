<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class etablissementsHistorique extends Model
{
    protected $table = 'etablissements_historique';

    protected $fillable = [
        'siren',
        'nic',
        'siret',
        'date_debut',
        'date_fin',
        'etat_administratif',
        'changement_etat_admin',
        'enseigne_1',
        'enseigne_2',
        'enseigne_3',
        'changement_enseigne',
        'denomination_usuelle',
        'changement_denomination_usuelle',
        'activite_principale',
        'nomenclature_activite',
        'changement_activite_principale',
        'caractere_employeur',
        'changement_caractere_employeur',
    ];

    //Search all etablishments by siren
    public static function searchBySiren($siren)
    {
        return self::where('siren', $siren)->get();
    }

    public static function searchBySiret($siret)
    {
        return self::where('siret', $siret)->first();
    }
}
