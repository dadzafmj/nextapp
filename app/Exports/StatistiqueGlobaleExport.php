<?php

namespace App\Exports;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Helper;
use App\Exports\StatistiqueGlobaleExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\gestionStatistique\Statistique;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StatistiqueGlobaleExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
public $date_debut;
public $date_fin;

    public function __construct($date_debut,$date_fin){
$this->date_debut=$date_debut;
$this->date_fin= $date_fin;

    }

    public function collection()
    {
        // $data=Statistique::whereBetween('date_fact',[$this->date_debut,$this->date_fin])->distinct('date_fact')->get();
   //return $data;
        
        $statistiqueGlobales =  DB::table('Mouv_statistique')->select('date_fact')->whereBetween('date_fact',[$this->date_debut,$this->date_fin])->distinct('date_fact')->get();
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

     

       $statistiqueGlobales = $st_global;;
       return  $statistiqueGlobales;
    }



    public function headings(): array
    {
        return [
            'date_fact',
            'montant_fact',
            'remise_fact',
            'net_fact',
            'paye_fact',
            'reste'
            
        ];
    }
}





/**
 * 
 * 'date_fact',
   *         'num',
    *        'num_fact',
     *       'doss_patient',
     *       'type_adm',
     *       'ferme',
      *      'consult',
      *      'radio',
     *       'echo',
      *      'fibro',
      *      'acte_med',
       *     'ponct',
      *      'gyneco',
      *      'chir_gastrique',
       *     'traumato',
       *     'analyse',
       *     'chir_diverse',
        *    'acte_diverse',
        *    'uro'	,
        *    'groupage',
         *   'interplast',
        *    'oph',
         *   'pharmacie',
        *    'heberg',
        *    'majoration',
        *    'maj_cds',
        *    'remise_fact',
        *    'autres',
        *    'montant_fact',
          *  'net_fact',
         *   'paye_fact',
 * 
 */