<?php

namespace App\Http\Controllers\gestionStatistique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDO;
use PDF;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class StatistiqueController extends Controller
{
    public function index(){
            
        return view('gestionStatistique.index');
    
    }

    /** mis a jour du statistique su l intervalle de temps donne */

public function misAjour(Request $request){

    $date_debut = $request->get('date_debut');
  
    $date_fin = $request->get('date_fin');
  
    $choix = $request->get('btn_post');  
  
    $bdd = DB::connection('mysql')->getPdo();

      #   $query='SELECT * FROM `facture`';
            
          #  $reponse = $bdd->query("$query");
            
            
            
              #  $data=$reponse->fetchall(PDO::FETCH_OBJ);


                
                $date_debut_insertion = $date_debut;
                $date_fin_insertion = $date_fin;
                $btn_post = $choix;
                
                switch($btn_post)
                {
                    case 'AJOUT':
                    {
                        
                    $sql1 = "SELECT * FROM `Mouv_facture_client` WHERE `date_fact` BETWEEN '$date_debut_insertion' AND '$date_fin_insertion'";
                    $req1 = $bdd->query($sql1);
                    
                    while($res1 = $req1->fetch(PDO::FETCH_OBJ))
                    {
                        $date_fact = $res1->date_fact;
                        
                        $num_fact = $res1->num_fact;
                        $doss_patient = $res1->doss_patient;
                        $montant_fact = $res1->montant_fact;
                        $remise_fact = $res1->remise_fact;
                        $net_fact = $res1->net_fact;
                        $reste_fact = $res1->reste_fact;
                        $paye_fact = $net_fact-$reste_fact;

                        $sql2 = "SELECT `typ_adm`,`date_fermeture_doss` FROM `Mouv_admission` WHERE `doss_patient` LIKE '$doss_patient'";
                        $req2 = $bdd->query($sql2);
                        while($res2 = $req2->fetch(PDO::FETCH_OBJ))
                        {
                            $type_adm = $res2->typ_adm;
                            $date_fermeture_doss = $res2->date_fermeture_doss;
                            if($date_fermeture_doss!=null){$ferme = 1;}else{$ferme=0;}
                        }
                        $etat_supp = 'SUPP';
                        $sql3 = "SELECT `code_fam`,`montant`,`maj_cds`,`etat` FROM `Mouv_prestation_rendue` WHERE `doss_patient` LIKE '$doss_patient'";
                        $req3 = $bdd->query("$sql3");
                        //initialisation des prix
                        $consult = 0;
                          $radio = 0;
                          $echo = 0;
                          $fibro = 0;
                          $acte_med = 0;
                          $ponct = 0;
                          $gyneco = 0;
                          $chir_gastrique = 0;
                          $traumato = 0;
                          $analyse = 0;
                          $chir_diverse = 0;
                          $acte_diverse = 0;
                          $uro = 0;
                          $groupage = 0;
                          $interplast = 0;
                          $oph = 0;
                          $pharmacie = 0;
                          $heberg = 0;
                          $majoration = 0;
                          $maj_cds = 0;
                          $autres = 0;		
                        while($res3 = $req3->fetch(PDO::FETCH_OBJ))
                        {
                            $code_fam = $res3->code_fam;
                            $montant = $res3->montant;
                            $maj_cds0 = $res3->maj_cds;
                            $etat = $res3->etat;
                            if($etat=='SUPP'){$montant = 0;$maj_cds0 = 0;}
                            switch($code_fam)
                            {
                                case '01':{$consult = $consult + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '02':{$radio = $radio + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '03':{$echo = $echo + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '04':{$fibro = $fibro + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '05':{$acte_med = $acte_med + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '06':{$ponct = $ponct + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '07':{$gyneco = $gyneco + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '08':{$chir_gastrique = $chir_gastrique + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '09':{$uro = $uro + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '10':{$traumato = $traumato + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '11':{$acte_diverse = $acte_diverse + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '12':{$chir_diverse = $chir_diverse + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '15':{$interplast = $interplast + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '16':{$oph = $oph + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '20':{$analyse = $analyse + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '21':{$groupage = $groupage + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                case '22':{$oph = $oph + $montant;$maj_cds = $maj_cds + $maj_cds0;};break;
                                default :{ $autres = $autres + $montant;};
                            }
                        }
                        $sql4 = "SELECT `montant` FROM `Mouv_sortie_vente` WHERE `doss_patient` LIKE '$doss_patient'";
                        $req4 = $bdd->query("$sql4");
                        while($res4 = $req4->fetch(PDO::FETCH_OBJ))
                        {
                            $montant = $res4->montant;
                            $pharmacie = $pharmacie + $montant;
                        }
                        $sql5 = "SELECT `montant` FROM `Mouv_hebergement` WHERE `doss_patient` LIKE '$doss_patient'";
                        $req5 = $bdd->query("$sql5");
                        while($res5 = $req5->fetch(PDO::FETCH_OBJ))
                        {
                            $montant = $res5->montant;
                            $heberg = $heberg + $montant;
                        }
                        $sql6 = "SELECT `mont_major`,`etat` FROM `Mouv_majoration` WHERE `doss_patient` LIKE '$doss_patient'";
                        $req6 = $bdd->query("$sql6");
                        while($res6 = $req6->fetch(PDO::FETCH_OBJ))
                        {
                            $montant = $res6->mont_major;
                            $etat = $res6->etat;
                            if($etat=='SUPP'){$montant=0;};
                            $majoration = $majoration + $montant;
                        }
                $prestation_rendue = $consult+$radio+$echo+$fibro+$acte_med+$ponct+$gyneco+$chir_gastrique+$traumato+$analyse+$chir_diverse+$acte_diverse+$uro+$groupage+$interplast+$oph;
                $total_rubrique = $prestation_rendue+$pharmacie+$heberg+$majoration+$maj_cds;
                $autres = $montant_fact - $total_rubrique;
                $sql_insert = "INSERT INTO `Mouv_statistique` (`num`, `date_fact`, `num_fact`, `doss_patient`, `type_adm`, `ferme`, `consult`, `radio`, `echo`, `fibro`, `acte_med`, `ponct`, `gyneco`, `chir_gastrique`, `traumato`, `analyse`, `chir_diverse`, `acte_diverse`, `uro`, `groupage`, `interplast`, `oph`, `pharmacie`, `heberg`, `majoration`, `maj_cds`,`autres`, `montant_fact`, `remise_fact`, `net_fact`, `paye_fact`) 
                VALUES(NULL, '$date_fact', '$num_fact', '$doss_patient', '$type_adm', '$ferme', '$consult', '$radio', '$echo', '$fibro', '$acte_med', '$ponct', '$gyneco', '$chir_gastrique', '$traumato', '$analyse', '$chir_diverse', '$acte_diverse', '$uro', '$groupage', '$interplast', '$oph', '$pharmacie', '$heberg', '$majoration', '$maj_cds','$autres', '$montant_fact', '$remise_fact', '$net_fact', '$paye_fact')";
                        $bdd->query("$sql_insert");
                    }
                    }
                    break;
                    case 'SUPPR': {$bdd->query("DELETE FROM `Mouv_statistique` WHERE `date_fact` BETWEEN '$date_debut_insertion' AND '$date_fin_insertion'");};break;
                    case 'UPDATEE': {

                    };
                    break;
                }

            return 'operation reussi';

}

/**end of  mis a jour du statistique su l intervalle de temps donne */

            public function voirStatistiqueForm(){
            
                return view('gestionStatistique.formulaireVoirStatistique');
            
            }





            public function affichageStatistique(Request $request){
                        $option = $request->get('option');

                        $date_debut = $request->get('date_debut');

                        $date_fin = $request->get('date_fin');

                        $statistique = [
                            'option' => $option,
                            'date_debut' => $date_debut,
                            'date_fin' => $date_fin
                        ];
                        
                        switch($option){
                            case "1":{return  redirect()->route('statistiqueGlobale',[$date_debut,$date_fin]); break;}
                            case "2":{return  redirect()->route('statistiquePrestation',[$date_debut,$date_fin]); break;}
                            case "3":{return  redirect()->route('statistiqueDocteur',[$date_debut,$date_fin]); break;}
                            case "4":{return  redirect()->route('statistiqueUniteAdmission',[$date_debut,$date_fin]); break;}
                            case "5":{return  redirect()->route('statistiqueDetailsPrestation',[$date_debut,$date_fin]); break;}
                            case "6":{return  redirect()->route('statistiqueSortieHospitalisation',[$date_debut,$date_fin]); break;}
                            case "7":{return redirect()->route('statistiqueService',[$date_debut,$date_fin]);break;}
                        }
                        
                        
            }


                


    
}
