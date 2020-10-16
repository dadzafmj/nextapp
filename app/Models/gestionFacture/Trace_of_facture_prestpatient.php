<?php

namespace App\Models\gestionFacture;

use Illuminate\Database\Eloquent\Model;

class Trace_of_facture_prestpatient extends Model
{
    public $table = 'trace_of_facture_prestpatient';
    protected $connection = 'mysql2';
    protected $updated_at="false";
    protected $created_at="false";
    private $primarykey = 'id';
    

protected $fillable =[
   'id', 
   'id_facture', 
   'num_patient', 
   'idprest', 
   'etat_payement',
    'created_at', 
    'updated_at'
];
}
