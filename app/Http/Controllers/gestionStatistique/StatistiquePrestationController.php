<?php

namespace App\Http\Controllers\gestionStatistique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistiquePrestationController extends Controller
{
    public function statistiquePrestation($date_debut,$date_fin){

        return "success statistiquePrestation .$date_debut. *** .$date_fin.";
    }
}
