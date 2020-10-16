<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouv_statistique extends Model
{ public $table='Mouv_statistique';
    protected $connection = 'mysql';
    protected $updated_at="false";
    protected $created_at="false";
    protected $primaryKey="num";
    protected $fillable = [ 'num','date_fact','num_fact','doss_patient','type_adm','ferme','consult','radio','echo','fibro','acte_med','ponct','gyneco','chir_gastrique','traumato','analyse','chir_diverse','acte_diverse','uro','groupage','interplast','oph','pharmacie','heberg','majoration','maj_cds','autres','montant_fact','remise_fact','net_fact','paye_fact',
];
}
