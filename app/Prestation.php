<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    public $table='prestations';
    protected $connection = 'mysql2';
    protected $updated_at="false";
    protected $created_at="false";
}
