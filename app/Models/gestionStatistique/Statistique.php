<?php

namespace App\Models\gestionStatistique;

use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    public $table = 'Mouv_statistique';
    protected $connection = 'mysql';
    protected $updated_at="false";
    protected $created_at="false";
    private $primarykey = 'id';
    

protected $fillable =[
                    'date_fact',
                    'num',
                    'num_fact',
                    'doss_patient',
                    'type_adm',
                    'ferme',
                    'consult',
                    'radio',
                    'echo',
                    'fibro',
                    'acte_med',
                    'ponct',
                    'gyneco',
                    'chir_gastrique',
                    'traumato',
                    'analyse',
                    'chir_diverse',
                    'acte_diverse',
                    'uro'	,
                    'groupage',
                    'interplast',
                    'oph',
                    'pharmacie',
                    'heberg',
                    'majoration',
                    'maj_cds',
                    'remise_fact',
                    'autres',
                    'montant_fact',
                    'net_fact',
                    'paye_fact',
                    ];
}
