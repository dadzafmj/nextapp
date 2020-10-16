<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestpatient extends Model
{
    public $table='prestpatient';
    protected $connection = 'mysql2';
    protected $updated_at="false";
protected $fillable =[
    'ref_prest',
    'idprest',
    'nom_prest',
    'num_patient',
    'nombre_prest',
    'prix_prest',
    'date_prest'    
];
    protected $created_at="false";
    protected $primaryKey="idprest";
}
