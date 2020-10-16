<?php

namespace App\Http\Controllers\gestionStatistique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDO;
use DB;
use Illuminate\Support\Collection;
use Helper;
use App\Exports\StatistiqueGlobaleExport;
use Maatwebsite\Excel\Facades\Excel;

class StatistiqueServiceController extends Controller
{
    public function statistiqueService($date_debut,$date_fin){
        $st_service = new Collection();
        $bdd=DB::connection('mysql')->getPdo();
        
        $sql1 = "SELECT DISTINCT  `date_fact` FROM  `Mouv_statistique` WHERE  `date_fact` BETWEEN  '$date_debut' AND  '$date_fin' ORDER BY `date_fact`";
        $req1 = $bdd->query("$sql1");
       $res1 = $req1->fetchall(PDO::FETCH_OBJ);


        $count=0;
        $total_med=0;
        $total_chi=0;
        $total_mat=0;
        $total_ped=0;
        $total_urg=0;
        $total_soin=0;
        $total_autres=0;
        $total_total=0;
     
            foreach( $res1  as $data1){
                

                        $count = $count+1;
                        $date_fact = $data1->date_fact;
                        $sql2 = "SELECT `doss_patient`,`net_fact` FROM `Mouv_statistique` WHERE `date_fact`='$date_fact' AND `ferme`='1' AND `type_adm` LIKE 'HOSP'";
                        $req2 = $bdd->query($sql2);
                        $res2= $req2->fetchall(PDO::FETCH_OBJ);
                        //initialisation a chaque changement de date
                        $montant_med=0;$montant_chi=0;$montant_mat=0;$montant_ped=0;$montant_urg=0;$montant_soin=0;$montant_autres=0;$montant_total=0;
	
                        foreach( $res2 as $data2){
                                $net_fact = $data2->net_fact;
                                $doss_patient = $data2->doss_patient;
                                $sql3 = "SELECT `code_sce` FROM `Mouv_hebergement` WHERE `doss_patient` LIKE '$doss_patient'";
                                $req3 = $bdd->query($sql3);
                                $res3 = $req3->fetchall(PDO::FETCH_OBJ);

                                foreach($res3 as $data3){
                                            $code_sce = $data3->code_sce;
                                            switch($code_sce){
                                            
                                                    case 12 : $montant_med = $montant_med + $net_fact;break;
                                                    case 13 : $montant_ped = $montant_ped + $net_fact;break;
                                                    case 14 : $montant_chi = $montant_chi + $net_fact;break;
                                                    case 15 : $montant_mat = $montant_mat + $net_fact;break;
                                                    case 19 : $montant_urg = $montant_urg + $net_fact;break;
                                                    default : $montant_autres = $montant_autres + $net_fact;break;
                                                }

                                 }

                                 $montant_pha = 0;


                            }


                            $st_service->add(["$date_fact"=>[
                                'date_fact'=>"$date_fact",
                                'montant_med' => "$montant_med",
                                'montant_ped'=> " $montant_ped",
                                 'montant_chi'=> "$montant_chi",
                                 'montant_mat' =>  "$montant_mat" ,
                                 'montant_urg' => "$montant_urg",
                                 'montant_autres' =>  "$montant_autres" ,              
            
                                ]]);

             
                            }

                            $statistiqueGlobales = $st_service;

                            
           


                            return view('gestionStatistique.statistiqueService',compact('statistiqueGlobales','date_debut','date_fin'));
                       


        }


}
