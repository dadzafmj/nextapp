<?php

namespace App\Http\Controllers\gestionStatistique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistiqueDocteurController extends Controller
{
    public function statistiqueDocteur($date_debut,$date_fin){

        return "success statistiqueDocteur .$date_debut. *** .$date_fin.";
    }
}
