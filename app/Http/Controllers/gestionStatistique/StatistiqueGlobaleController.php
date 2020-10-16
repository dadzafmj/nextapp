<?php

namespace App\Http\Controllers\gestionStatistique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Helper;
use App\Exports\StatistiqueGlobaleExport;
use Maatwebsite\Excel\Facades\Excel;
class StatistiqueGlobaleController extends Controller
{
    public function statistiqueGlobale($date_debut,$date_fin){


        $statistiqueGlobales =  DB::table('Mouv_statistique')->select('date_fact')->whereBetween('date_fact',[$date_debut,$date_fin])->distinct('date_fact')->get();
        $st_global = new Collection();
            foreach($statistiqueGlobales as $statistiqueGlobale){

                $date_facture= $statistiqueGlobale->date_fact;
                $st_date_by_dates = DB::table('Mouv_statistique')
                                                    ->where('date_fact',"$date_facture")
                                                    ->distinct('date_fact')->get();
                                                    
                                    $montant_fact=0;
                                    $remise_fact=0;
                                    $net_fact =0;
                                    $paye_fact=0;
                                    $reste =0;

                     foreach($st_date_by_dates as $st_date_by_date ) {
                                    $montant_fact = $montant_fact + $st_date_by_date->montant_fact ;
                                    $remise_fact  = $remise_fact   + $st_date_by_date->remise_fact ;
                                    $net_fact     = $net_fact      + $st_date_by_date->net_fact ;
                                    $paye_fact    = $paye_fact   + $st_date_by_date->paye_fact ;
                                    $reste        = $net_fact - $paye_fact  ;

                

                     }       

                     $st_global->add(["$date_facture"=>[
                    'date_fact'=>"$date_facture",
                    'montant_fact'=> "$montant_fact",
                     'remise_fact'=> "$remise_fact",
                     'net_fact' =>  "$net_fact"  ,
                     'paye_fact' => "$paye_fact",
                     'reste' =>  "$reste"  ,              

                    ]]);




            };

          

            $statistiqueGlobales = $st_global;

            
           


        return view('gestionStatistique.statistiqueGlobale',compact('statistiqueGlobales','date_debut','date_fin'));
    }

    public function export(Request $Request){
        $date_debut= $Request->get('date_debut');
        $date_fin = $Request->get('date_fin');
        return Excel::download(new StatistiqueGlobaleExport($date_debut,$date_fin), 'books.xlsx');
        
    }
}