<?php

namespace App\Http\Controllers\gestionStatistique;


use DB;
use Illuminate\Support\Collection;
use Helper;
//use App\Exports\StatistiqueGlobaleExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\gestionStatistique\Statistique;
use App\Models\gestionStatistique\Mouv_admission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistiqueUniteAdmissionController extends Controller
{
    
    public function  statistiqueUniteAdmission ($date_debut,$date_fin){


     $admisssions = Statistique::select('date_fact')->whereBetween('date_fact',[$date_debut,$date_fin])->distinct('date_fact')->orderBy('date_fact')->get();
     $st_admission = new Collection;
      foreach($admisssions as $admisssion){
        $date_facture=$admisssion->date_fact;
       
        $st_date_by_dates = DB::table('Mouv_statistique')
        ->where('date_fact',"$date_facture")
        ->distinct('date_fact')->get();

        $montant_ext=0;
        $montant_exte=0;	
        $montant_hosp=0;
        $montant_pec=0;
        $montant_hpec=0;
        $montant_intp=0;
        $montant_hintp=0;
        $montant_medic=0;
        $montant_total=0;


          foreach($st_date_by_dates as $st_date_by_date ) {
            
            $type_adm = $st_date_by_date->type_adm;
            $net_fact = $st_date_by_date->net_fact;

              switch($type_adm)
              {
                case 'EXT' : $montant_ext = $montant_ext + $net_fact;break;
                case 'EXTE' : $montant_exte = $montant_exte + $net_fact;break;
                case 'HOSP' : $montant_hosp = $montant_hosp + $net_fact;break;			
                case 'HPEC' : $montant_hpec = $montant_hpec + $net_fact;break;
                case 'INTP' : $montant_intp = $montant_intp + $net_fact;break;
                case 'HINT' : $montant_hintp = $montant_hintp + $net_fact;break;
                case 'MEDIC': $montant_medic = $montant_medic + $net_fact;break;
                default : $montant_pec = $montant_pec + $net_fact;break;
              }

          } 
          
          $montant_total = $montant_ext + $montant_exte + $montant_hosp + $montant_pec + $montant_hpec + $montant_intp + $montant_hintp + $montant_medic;


          $st_admission->add(["$date_facture"=>[
            'date_fact'   => "$date_facture",
            'EXT'         =>  "$montant_ext",
            'EXTE'        => "$montant_exte",
            'HOSP'        => "$montant_hosp",   
            'PEC'         =>  "$montant_pec",
            'HPEC'        =>  "$montant_hpec",
            'INTP'        =>  "$montant_intp",      
            'HINT'        =>  "$montant_hintp",
            'MEDIC'       =>  "$montant_medic",
            'TOTAL'       =>  "$montant_total",
            ]]);

      
        };

        $statistiqueGlobales = $st_admission;
       
        return view('gestionStatistique.statistiqueParAdmission',compact('statistiqueGlobales','date_debut','date_fin'));

  }













}
