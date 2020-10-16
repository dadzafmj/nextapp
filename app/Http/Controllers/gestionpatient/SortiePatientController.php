<?php

namespace App\Http\Controllers\gestionpatient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use DB;
use PDO;

class SortiePatientController extends Controller
{
        public function index() {

                $result = Patient::all();
                $patients = $result->sortByDesc('num_patient');
                return view('gestionPatient.sortiePatient',compact('patients'));
        }


        public function recherche(Request $request){

                $bdd = DB::connection('mysql2')->getPdo();

                $recherche = $request->get('recherche');

                $query="SELECT *  FROM patient WHERE  MATCH(nom_patient,prenom_patient,num_patient,date_arrive,tel,adresse) AGAINST ('$recherche'IN BOOLEAN MODE) ORDER BY date_arrive DESC" ;

                $req = $bdd->query("$query");

                $patients = $req->fetchall(PDO::FETCH_OBJ);
            
                return view('gestionPatient.sortiePatient',compact('patients'));
            
        }

        public function show(Request $request){
            $numpatient = $request->get('num_patient');

            $patient = Patient::find($numpatient);
        //foreach($patients as $patient){

           // dd($patient->num_patient);

       // }
            return view('gestionPatient.formulaireSortiePatient',compact('patient'));

        }

        public function store(Request $request){


                


                $numpatient = $request->get('num_patient');


                function modifier( $input_name,Request $request ){
                        /**la fonction "modifier" modifie la table patient, en parametre le nom
 *  de l'attribut et sa valeur dont le nom de l'attibut est même nom à
 *  celui de l'input du formulaire, et la valeur
 *  est stoquer dans l'instance de l'objet Request  */
                        $input_value = $request->get("$input_name");
                        $num_patient = $request->get('num_patient');
                       
                                
                                   
                                 if(isset($input_value))
                                        {
                                            $bdd = DB::connection('mysql2')->getPdo();
                                            $query = "UPDATE patient SET $input_name = '$input_value' WHERE num_patient = '$num_patient'";
                                            
                                   $bdd->exec($query);
                    
                                        }
                    
                    
                                    }
                    //endfunction
                    modifier('decision_sortie',$request);
                    modifier('diagnostic_sortie',$request);
                    modifier('date_sortie',$request);

                $lastModifiedPatient = Patient::find($numpatient);
                $result = Patient::all();
                $patients = $result->sortByDesc('num_patient');

                 return view('gestionPatient.sortiePatient',compact('patients','lastModifiedPatient'))->withSuccess('La sortie du patient bien enregistrer!');

                
        }
}
