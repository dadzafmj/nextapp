<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier_medical extends Model
{
    public $table='dossier_medical';
    protected $connection = 'mysql2';
    protected $updated_at="false";
    protected $created_at="false";
    protected $primaryKey="id_dm";
    protected $fillable = [
    
    'date_dm',
    'num_patient',
    'nom_patient',
    'prenom_patient',
    'date_naissance_patient',
    'sexe_patient',
    'nationalite_patient',
    'adresse_patient',
    'profession_patient',
    'motifs',
    'histoire_maladie',
    'atcd_tfr',
    'atcd_med',
    'atcd_ht',
    'atcd_chir',
    'atcd_obs',
    'atcd_fam',
    'ec_etat_general',
    'ec_trois_signes',
    'ec_facies',
    'ec_md',
    'ec_ta',
    'ec_fc',
    'ec_fr',
    'ec_diurese',
    'ec_ec',
    'ec_ehc',
    'ec_ep',
    'signes_fonctionnelles',
    'signes_examen_physique',
    'hypothese',
    'examen_complementaires',
    'fichier_dm'
    ];
}
