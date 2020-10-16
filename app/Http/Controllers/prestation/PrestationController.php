<?php

namespace App\Http\Controllers\prestation;
use App\Models\gestionPrestation\Make_facture_prestpatient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prestation;
use App\Prestpatient;
use App\Patient;
use DB;
use PDO;
use Carbon;
 
class PrestationController extends Controller
{
    public function index(){
       
        $prestations=Prestation::all();
       
        return view('gestionPrestation.listePrestation',compact('prestations'));
    }


    public function demande(){
        return view('gestionPrestation.formulaireDemandePrestation');

    }


    public function demandePrestationStore(Request $request ){
        
        $date = new Carbon();
        $date_prest = $date->format('yy-m-d');


        $prestpatient =new Prestpatient([
            'ref_prest'     => $request->get("ref_prest"),
            'idprest'       => NULL,
            'nom_prest'     => $request->get("nom_prest"),
            'num_patient'   => $request->get("num_patient"),
            'nombre_prest'  => $request->get('nombre_prest'),
            'prix_prest'    => $request->get("prix_prest")*$request->get('nombre_prest'),
            'date_prest'    => $date_prest
        ]);
        $prestpatient->save();

/**fair du trace sur la facturation on doit marquer que le prestation est 
 * deja facturer ou non : l'ett de boolean etat facture doit false avant que la facturation soit effectue */
    /**------------------------************-------------------------- */       
            
                    $bdd = DB::connection('mysql2')->getPdo();

                    $query='SELECT *  FROM `prestpatient`WHERE idprest = LAST_INSERT_ID()' ;
                    
                    $req = $bdd->query("$query");
                    while($last_prestation = $req->fetch(PDO::FETCH_OBJ))
                    {
                    
                        $last_prest['idprest'] = $last_prestation->idprest;
                        $last_prest['num_patient'] = $last_prestation->num_patient;

                    };
                    
                    $etat_facture = new Make_facture_prestpatient([
                        
                        'idprest' =>  $last_prest['idprest'],
                        'num_patient'=> $last_prest['num_patient'],
                        'etat_facturation' => 0
                    ]);
                    $etat_facture->save();

            
/**-------------------------*********************-------------------------- */
            


/**affichagu du prestation fraichement ajouté moais qui n'a pas encour facturer */

/** -------------------------**********************-------------------------*/

                $results = DB::connection('mysql2')->select('select * from make_facture_prestpatient where etat_facturation = :etat_facturation AND num_patient =:num_patient ', ['etat_facturation' => 0,  'num_patient' =>$last_prest['num_patient'] ]);
                
                
                if(isset($results)){
                    if ($results != NULL){
                        $i=0;
                
                    foreach($results as $result){

                    $idprest[$i] = "$result->idprest";
                    
                    $i++;
                    };


                    


                    $lastPrestations = DB::connection('mysql2')
                    ->table('prestpatient')
                    ->wherein('idprest',$idprest)->get();


                    $prestations=Prestation::all();
                    $patient = Patient::find($last_prest['num_patient']);

                    /** Total tu prix du prestation */
                    
                    $montantTotal=0;
                   
                    foreach($lastPrestations as $lastPrestation){

                        $montantTotal = $montantTotal +$lastPrestation->prix_prest;  

                    }
                
                    return view('gestionPrestation.prestationForSelectedClient',compact('prestations','lastPrestations','patient','montantTotal'));
                    
                    }
                }
/** -----------------------**************************------------------------*/
            return 'no element ';

    }




    public function listePrestationRendu(){
        
        $prestationRendus = Prestpatient::paginate(30);
        return view('gestionPrestation.listePrestationRendue',compact('prestationRendus'));

    }

/**Prestation pour un patient selectionner sur la liste de patient */


    

public function deletePrestPatient($idprest,$numpatien){
    
    $makefacture = Make_facture_prestpatient::where('idprest',"$idprest");
    if(isset($makefacture))
        {
            $makefacture = Make_facture_prestpatient::where('idprest',"$idprest")->delete();
        }
        $presT=Prestpatient::find("$idprest");
        if(isset($presT)){
            Prestpatient::find("$idprest")->delete();
        }

/**on selection l'id de  tous les trace de prestation si le numeros de patient en question n'a pas encore regle sa facture (etat facture =0) */
                   

                    $results = DB::connection('mysql2')->select('select * from make_facture_prestpatient where etat_facturation = :etat_facturation AND num_patient =:num_patient ', ['etat_facturation' => 0,  'num_patient' => $numpatien ]);
                $i=0;
                
                if(isset($results)){
                    if($results != NULL){



                        foreach($results as $result){

                            $iD[$i] = "$result->idprest";
                            
                            $i++;
                            };
        /**o selectionne le prestation selon l'id remplis le condition dont: cette prestation est effectuer par le client en question et l'etat de facturation à 0   */
                            $lastPrestations = DB::connection('mysql2')
                            ->table('prestpatient')
                            ->wherein('idprest',$iD)->get();
        
                            
                            
                            /**------------------------End selection ----- */
        
                            /** Total tu prix du prestation */
                            
                            $montantTotal=0;
                           
                            foreach($lastPrestations as $lastPrestation){
        
                                $montantTotal = $montantTotal +$lastPrestation->prix_prest;  ;
        
                            }
        
        
        
                            /**----------------***********------------------ */
        
                            $patient = Patient::find("$numpatien"); /**on selection le patien en question */
                            $prestations=Prestation::all(); /** on selectione tous les liste de prestation disponible pour permetre au choix des eventuele demende de prestation */
         return view('gestionPrestation.prestationForSelectedClient',compact('prestations','patient','lastPrestations', 'montantTotal'));
        






                    }
                }
                $prestations=Prestation::all();
                $patient = Patient::find("$numpatien");

                return view('gestionPrestation.prestationForSelectedClient',compact('prestations','patient'));
        

}



}
