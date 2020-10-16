<?php

namespace App\Http\Controllers\gestionStatistique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistiqueDetailsPrestationController extends Controller
{
    public function statistiqueDetailsPrestation($date_debut,$date_fin){

        return "success statistiqueDetailsPrestation .$date_debut. *** .$date_fin.";
    }
}
