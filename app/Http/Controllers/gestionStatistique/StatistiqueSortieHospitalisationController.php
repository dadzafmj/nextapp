<?php

namespace App\Http\Controllers\gestionStatistique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistiqueSortieHospitalisationController extends Controller
{
    public function statistiqueSortieHospitalisation($date_debut,$date_fin){

        return "success statistiqueSortieHospitalisation .$date_debut. *** .$date_fin.";
    }
}
