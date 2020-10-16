<?php

namespace App\Http\Controllers\gestionpatient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Docteur;
use PDO;
use DB;
use App\Unite_admission;

class UpdatePatientController extends Controller
{
    public function index(Request $request){


        $docteurs = Docteur::all();

        $bdd = DB::connection('mysql2')->getPdo();
        $num_patient = $request->get('num_patient');
        $query="SELECT * FROM patient WHERE num_patient = $num_patient" ;
                                
        $req = $bdd->query("$query");
        $patient= $req->fetch(PDO::FETCH_OBJ);



        return view('gestionPatient.prestationFonctionaire.modifierPatient',compact( 'docteurs','patient'));

    }


    public function store(Request $request){
        $num_patient = $request->get('num_patient');
        function modifier( $input_name,Request $request ){
            $input_value = $request->get("$input_name");
            $num_patient = $request->get('num_patient');
           
                    
                       
                     if(isset($input_value))
                            {
                                $bdd = DB::connection('mysql2')->getPdo();
                                $query = "UPDATE patient SET $input_name = '$input_value' WHERE num_patient = '$num_patient'";
                                
                       $bdd->exec($query);
        
                            }
        
        
                        }


                     modifier('nom_patient',$request);
                     modifier('prenom_patient',$request);
                     modifier('age',$request);
                     modifier('unite_age',$request);
                     modifier('adresse',$request);
                     modifier('tel',$request);
                     modifier('medecin_prescripteur',$request);
                     modifier('date_arrive',$request);
                     modifier('lien_parente',$request);

                     $bdd = DB::connection('mysql2')->getPdo();
                     $query="SELECT * FROM patient WHERE num_patient = $num_patient" ;
                                             
                     $req = $bdd->query("$query");
                     $patient= $req->fetch(PDO::FETCH_OBJ);


                     $unite_admissions = Unite_admission::all();

                     $check_sex_agent =array(
                        'masculin' =>'',
                        'feminin' => ''
                    );

                    if($patient->lien_parente == 'a'){


                        if($patient->sexe == 'M')
                        {
                            $check_sex_agent{'masculin'}= 'checked';

                        };

                        if($patient->sexe == 'F')
                        {
                            $check_sex_agent{'feminin'}= 'checked';

                        };


                    }
                    $check_sex_agent = (object)$check_sex_agent;

                   return  view('gestionPatient.prestationFonctionaire.modificationHospitalisation',compact('patient','unite_admissions','check_sex_agent'));


    }
}
