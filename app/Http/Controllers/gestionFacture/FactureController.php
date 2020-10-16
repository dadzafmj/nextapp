<?php

namespace App\Http\Controllers\gestionFacture;
use App\Models\gestionFacture\Trace_of_facture_prestpatient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facture;
use Carbon\Carbon;
use App\Models\gestionPrestation\Make_facture_prestpatient;
use App\Prestation;
use App\Patient;
use DB;
use PDO;
use App\Prestpatient;
use PDF;


class FactureController extends Controller
{
    public function index(){
        return view('gestionFacture.formulaireInsertionFacture');
    }
/**fonction enregistrement facture dans la base */
                public function store($date_facture,
                                    $date_entree,
                                    $num_facture,
                                    $num_patient,
                                    $montant_facture,
                                    $date_prest, 
                                    $nom_prest,
                                    $ref_prest ,
                                    $nombre_prest, 
                                    $prix_prest,$idprest){

                        $facture= new Facture([ 
                            'date_entree'=>     $date_entree,
                            'date_facture'=>    Carbon::today()->format('d-m-y'),
                            'num_facture'=>     $num_facture,
                            'num_patient'=>     $num_patient,
                            'montant_facture'=> $montant_facture,
                            'date_prest'=>      $date_prest,
                            'nom_prest'=>       $nom_prest,
                            'ref_prest'=>       $ref_prest,
                            'nombre_prest'=>    $nombre_prest,
                            'prix_prest'=>      $prix_prest ,
                            'idprest' => $idprest
                    ]);
                    $facture->save(); 

                
                }
    
/**trace du facturation vaut false par defaut et true apres avoir imprimer la facture */

                    public function trace_payement_update(){




                     $bdd = DB::connection('mysql2')->getPdo();

                        $query='SELECT *  FROM `facture` WHERE id_facture = LAST_INSERT_ID()' ;
                        
                        $req = $bdd->query("$query");
                        while($last_facturation = $req->fetch(PDO::FETCH_OBJ))
                        {
                        
                          $last_fact['id_facture'] = $last_facturation->id_facture;
                           $last_fact['num_patient'] = $last_facturation->num_patient;
                           $last_fact['idprest'] = $last_facturation->idprest;
                       };
                        
                        
                        $etat_facture = new  Trace_of_facture_prestpatient([
                            
                           'id_facture' =>  $last_fact['id_facture'],
                           'idprest' => $last_fact['idprest'],
                            'num_patient'=> $last_fact['num_patient'],
                            'etat_payement' => false
                        ]);
                        $etat_facture->save();
                        
        
                    }
            






/** a instantier via la route pour faire l'enregistrement */
    public function factureStore($numpatient){

        /** $a= "12-05-2018 " ;
*$now = new Carbon($a);
*$h = $now->format('y');
  
  *echo($h);*/
        $now = new Carbon();

        /** va chercher l'id sur prestpatient apartient au patient numeros : $numpatient */
      
        $results = DB::connection('mysql2')->select('select * from make_facture_prestpatient where etat_facturation = :etat_facturation AND num_patient =:num_patient ', ['etat_facturation' => 0,  'num_patient' => $numpatient ]);
		
		
		if(isset($results)) //if 1
		{
			if($results != Null) //if2
			{
				
								$i=0;
								
								foreach($results as $result){

									$ID[$i] = "$result->idprest";
									
									$i++;
                
                
                
                
                                }; //end foreach

             $lastPrestations = DB::connection('mysql2')
                                ->table('prestpatient')
                                ->wherein('idprest',$ID)->get();
                                
                                $patients = Patient::select("date_arrive")->where('num_patient',"$numpatient")->get();
                                foreach($patients as $patient ){
                                    $dateEntree     = "$patient->date_arrive" ;
                                }
                               
                                
                     foreach($lastPrestations as $lastPrestation  ){          
                                $date_facture    = $now->format('y-m-d');
                                $dateEnt = new Carbon($dateEntree );
                                
                                $date_entree     = $dateEnt->format('y-m-d');
                                
                                $num_facture     = 255255;
                                $num_patient     = $numpatient;
                                
                                $montant_facture = $lastPrestation->prix_prest;
                                $idprest = $lastPrestation->idprest;
                                $date_prest      = $lastPrestation->date_prest;
                                $nom_prest       = $lastPrestation->nom_prest;
                                $ref_prest       = $lastPrestation->ref_prest;

                                /** get prix unitaire de prestation */
                                $prix_prests = Prestation::select("prix_prestation")->where('ref_prestation',"$ref_prest")->get();
                                foreach($prix_prests as $prix_prest ){
                                    $prixPrest     = "$prix_prest->prix_prestation" ;

                                }
                                
                                /**----- */

 
                                $nombre_prest    = $lastPrestation->nombre_prest;
                                $prix_prest      = $prixPrest ;
                               
                                $fact= new FactureController();

                                $fact->store ($date_facture,
                                                $date_entree, 
                                                $num_facture,
                                                $num_patient, 
                                                $montant_facture,
                                                $date_prest, 
                                                $nom_prest,
                                                $ref_prest ,
                                                $nombre_prest,
                                                $prix_prest,
                                                $idprest);
                                                /** laisser du trace pour cette facturation en enregistrant com false l'etat payement */
                                               $this->trace_payement_update();    
                                            } 
                                
                                              $traceFactures = DB::connection('mysql2')->select('select * from make_facture_prestpatient 
                                                where etat_facturation = :etat_facturation AND num_patient =:num_patient ', 
                                                ['etat_facturation' => 0,  'num_patient' => $numpatient ]);

                                               
                                      
                                    foreach($traceFactures as $update_of_traceFact){
                                            
                                            $var = new Make_facture_prestpatient();
                                            $var->exists = true;
                                            $var->id = "$update_of_traceFact->id";
                                            $var->etat_facturation = true;
                                            $var->save();
                                          
                                            
                                    }

                                /** impression de facture */

                                $id_facture_non_paye = $this->get_id_facture_non_paye($numpatient);
                                
                              
                               
                               $factures = $this->affiche_facture($id_facture_non_paye);
                               

                               $patients = DB::connection('mysql2')
                               ->table('patient')
                               ->where('num_patient',$numpatient)->get();

                               $totals =  DB::connection('mysql2')
                               ->table('facture')->select('montant_facture')
                               ->wherein('id_facture',$id_facture_non_paye)->get();
                                    $total=0;
                               foreach($totals as $data){
                                   $total=$total+$data->montant_facture;
                               }

                             //$patient = Patient::find($numpatient)->get();
                           //  dd($patient->num_patient);

                                 return view('gestionFacture.facture',compact('patients','factures','total'));

             } //end if2
        } //end if1

        

    }
  
            public function affiche_facture($id){

                $facture = DB::connection('mysql2')
                ->table('facture')
                ->wherein('id_facture',$id)->get();
return $facture ;
                //$facture = Facture::wherein('id',"$id")->get();
                //dd($facture);

            }

            /**recherche id facture non paye */

    public function get_id_facture_non_paye($numpatient){
            
        $Facture_non_payes = DB::connection('mysql2')->select('select id_facture from  trace_of_facture_prestpatient 
        where etat_payement = :etat_payement AND num_patient =:num_patient ', 
        ['etat_payement' => false,  'num_patient' => $numpatient ]);
        

        
        $i = 0;
        foreach($Facture_non_payes as $Facture_non_paye){

            $idfact["$i"] =  $Facture_non_paye->id_facture;
            $i++;

        };
            return $idfact;


     }   

        public function annulation_facture($id_facture)
            {
                
                $makepayement = Trace_of_facture_prestpatient::where('id_facture',"$id_facture");
                
                if(isset($makepayement))
                    {
                        
                       
                        Trace_of_facture_prestpatient::where('id_facture',"$id_facture")->delete();
               }
                    $facT=Facture::find("$id_facture");
                    if(isset($facT)){
                        Facture::find("$id_facture")->delete();
                    } 
            }


        public function annulation_prestation($idprest)
            {
               
                    $makefacture = Make_facture_prestpatient::where('idprest',"$idprest");
                    if(isset($makefacture))
                        {
                            $makefacture = Make_facture_prestpatient::where('idprest',"$idprest")->delete();
                        }
                        $presT=Prestpatient::find("$idprest");
                     
                        if(isset($presT)){
                           $f= Prestpatient::find("$idprest")->delete();

                        } 
               

            }

            public function get_idprest_for_annulate_from_table_trace_payement($idfact){
               
                $traces = Trace_of_facture_prestpatient::where('id_facture',"$idfact")->get();
                
                foreach($traces as $trace){

                  $idprest =   "$trace->idprest";
                  
                  return $idprest;
                }

            }

            public function annuler_tout($numpatient){


                $Id_fact_nom_payes = $this->get_id_facture_non_paye($numpatient);

                foreach($Id_fact_nom_payes as $Id_fact_nom_paye ){

                 
                    $id_prestforannulate = $this->get_idprest_for_annulate_from_table_trace_payement($Id_fact_nom_paye);
                $this->annulation_prestation($id_prestforannulate);
              

                $this->annulation_facture($Id_fact_nom_paye);

                }
                return 'annulation whith success';

            }

            

            public function imprimer_facture(Request $request){
                $num_patient =$request->get('num_patient');
                $imprimer=true;
                $ID = $request->get('id');
                $total = $request->get('total');
                $str_id = explode(',',$ID);
               $factures = DB::connection('mysql2')
               ->table('facture')->wherein('id_facture',$str_id)->get();
               
               $patients = DB::connection('mysql2')
               ->table('patient')->where('num_patient', $num_patient)->get();

               $pdf = Pdf::loadView('gestionFacture.facture_imprimer', compact('patients','factures','total','imprimer'));
      
                return $pdf->download('facture.pdf');

            
            }
}
