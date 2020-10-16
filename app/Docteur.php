<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docteur extends Model
{
    public $table='docteur';
    protected $connection = 'mysql2';
    protected $updated_at="false";
    protected $created_at="false";
  
}
