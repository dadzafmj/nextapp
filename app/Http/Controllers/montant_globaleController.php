<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class montant_globaleController extends Controller
{
    public function index(Request $request){
 
        //$Mouv_admission = \App\Mouv_admissionModel::all();
        //$Mouv_hebergement = \App\Mouv_hebergementModel::all();
        //$Mouv_majoration = \App\Mouv_majorationModel::all();

        $date_debut = $request->input('date_debut');
        $date_fin = $request->input('date_fin');
        

        $Mouv_prestation_rendue =  DB::table('Mouv_prestation_rendue')->whereBetween('date_prst',[$date_debut,$date_fin])->get();
        return view('montant_globale.montant_globale_index',compact('Mouv_prestation_rendue'));
    }
    
    public function show(){
        return view('info');
    }
    
}

