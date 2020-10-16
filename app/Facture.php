<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    public $table='facture';
    protected $connection = 'mysql2';
    protected $updated_at="false";
    protected $created_at="false";
    protected $primaryKey="id_facture";
    protected $fillable = [
'id_facture',
'date_facture',
'date_entree',
'num_facture',
'num_patient',
'montant_facture',
'date_prest',
'nom_prest',
'ref_prest',
'nombre_prest',
'prix_prest',
'idprest'
    ];
}



