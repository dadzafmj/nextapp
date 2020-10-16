<?php

namespace App\Models\gestionPrestation;

use Illuminate\Database\Eloquent\Model;

class Make_facture_prestpatient extends Model
{
    public $table = 'make_facture_prestpatient';
    protected $connection = 'mysql2';
    protected $updated_at="false";
    protected $created_at="false";
    private $primarykey = 'id';
    

protected $fillable =[
    'id',
    'idprest',
    'num_patient',
    'etat_facturation'
];

}
