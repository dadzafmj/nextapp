<?php

namespace App;

use Illuminate\Database\Eloquent\Model;






class Operation extends Model
{
    public $table='operations';
    protected $connection = 'mysql2';
    protected $fillable = [
        'id_op',
        'date_op',
        'num_patient',
        'nom_patient',
        'date_naissance_patient',
        'prenom_patient',
        'sexe_patient',
        'operateur1',
        'operateur2',
        'operateur3',
        'operateur4',
        'anesthesiste1',
        'anesthesiste2',
        'infirmier1',
        'infirmier2',
        'anesthesiste3',
        'anesthesiste4',
        'infirmier3',
        'infirmier4',
        'type_intervention',
        'nombre_ko',
        'indication',
        'heure_entree',
        'heure_debut_op',
        'heure_fin_op',
        'heure_sortie',
        'actes_op',
        'consignes_part',
    ];

    protected $updated_at="false";
    protected $created_at="false";
    protected $primaryKey="id_op";
}
