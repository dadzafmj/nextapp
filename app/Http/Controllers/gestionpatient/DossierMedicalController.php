<?php

namespace App\Http\Controllers\gestionpatient;
use App\Dossier_medical;
use App\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Forms\SongForm;

use Carbon;
use DB;
use PDO;
class DossierMedicalController extends Controller
{
    public function index(){

        $result = Patient::all();
        $patients = $result->sortByDesc('num_patient');

    return view('gestionPatient.saisieDonneMedical_index',compact('patients'));




    }

    public function show(Request $request) {
         $num_patient = $request->get('num_patient');
         $patient = Patient::find($num_patient);
         
    

        return view('gestionPatient.saisieDonneMedical',compact('patient'));
    }






    public function saisieDonneMedicalStore(Request $request) {
       

        $date = new Carbon();
        $date = $date->format('yy-m-d');

       
        $num_patient=$request->get('num_patient');
        $patient = Patient::find($num_patient);


        
        
        



            $dm = array(
                'date_dm' => $date,
                'num_patient'=>	 $patient->num_patient,   
                'nom_patient'=>	 $patient->nom_patient,
                'prenom_patient'=> $patient->prenom_patient,
                'date_naissance_patient'=> 	$request->get('date_naissance_patient'),    
                'sexe_patient'=> $patient->sexe,	    
                'nationalite_patient'=>	$request->get('nationalite_patient'), 
                'adresse_patient'=>	 $patient->adresse,
                'profession_patient'=>	$request->get('profession_patient'),   
                'motifs'=> $request->get('motifs'),
                	    
                'histoire_maladie'=> $request->get('histoire_maladie'),	    
                'atcd_tfr'=>	    $request->get('atcd_tfr'),
                'atcd_med'=>	    $request->get('atcd_med'),
                'atcd_ht'=>	    $request->get('atcd_ht'),
               'atcd_chir'=>	    $request->get('atcd_chir'),
                'atcd_obs'=>	    $request->get('atcd_obs'),
                'atcd_fam'=>	    $request->get('atcd_fam'),
                'ec_etat_general'=>	    $request->get('ec_etat_general'),
                'ec_trois_signes'=>	    $request->get('ec_trois_signes'),
                'ec_facies'=>	    $request->get('ec_facies'),
                'ec_md'=>	    $request->get('ec_md'),
                'ec_ta'=>	    $request->get('ec_ta'),
                'ec_fc'=>	    $request->get('ec_fc'),
                'ec_fr'=>	    $request->get('ec_fr'),
                'ec_diurese'=>	$request->get('ec_diurese'),
                'ec_ec'=>	    $request->get('ec_ec'),
                'ec_ehc'=>	    $request->get('ec_ehc'),
                'ec_ep'=>	    $request->get('ec_ep'),
                'signes_fonctionnelles'=>	    $request->get('signes_fonctionnelles'),
                'signes_examen_physique'=>    $request->get('signes_examen_physique'),
                'hypothese'=>	    $request->get('hypothese'),
                'examen_complementaires'=>	    $request->get('examen_complementaires'),
                'fichier_dm'=> NULL,

            );
            
//the initialise(Array $param) function remplace to 0 
//the NULL's value of th array passed in the parameter.
            function initialise(Array $array){
                $array = $array;
               
                $keys = array_keys($array);
                $size = sizeof($keys);  


                $i=0;
            
            while($i <= $size-1){
                        $array_index = $keys[$i];
                        $array_value = $array[$array_index];
                        
                        if(!isset($array_value )){
                        $array[$array_index] = "abc abc";
                        
                        };
                        $i++;

            }

            return $array;

            }

            
          
$dm = initialise($dm);



        $dossier_medical = new Dossier_medical([
                'date_dm' => $dm{"date_dm"},
                'num_patient'=>	 $dm{"num_patient"},   
                'nom_patient'=>	 $dm{"nom_patient"},
                'prenom_patient'=> $dm{"prenom_patient"},
                'date_naissance_patient'=> 	$dm{"date_naissance_patient"},    
                'sexe_patient'=> $dm{"sexe_patient"},	    
                'nationalite_patient'=>	$dm{"nationalite_patient"}, 
                'adresse_patient'=>	 $dm{"adresse_patient"},
                'profession_patient'=>	$dm{"profession_patient"},   
                'motifs'=> $dm{"motifs"},
                	  'atcd_fam'  => $dm{"atcd_fam"},
                'histoire_maladie'=> $dm{"histoire_maladie"},	    
                'atcd_tfr'=>	    $dm{"atcd_tfr"},
                'atcd_med'=>	    $dm{"atcd_med"},
                'atcd_ht'=>	    $dm{"atcd_ht"},
               'atcd_chir'=>	   $dm{"atcd_chir"},
                'atcd_obs'=>	    $dm{"atcd_obs"},
                'ec_etat_general'=>	    $dm{"ec_etat_general"},
                'ec_trois_signes'=>	    $dm{"ec_trois_signes"},
                'ec_facies'=>	    $dm{"ec_facies"},
                'ec_md'=>	    $dm{"ec_md"},
                'ec_ta'=>	    $dm{"ec_ta"},
                'ec_fc'=>	    $dm{"ec_fc"},
                'ec_fr'=>	    $dm{"ec_fr"},
                'ec_diurese'=>	$dm{"ec_diurese"},
                'ec_ec'=>	    $dm{"ec_ec"},
                'ec_ehc'=>	    $dm{"ec_ehc"},
                'ec_ep'=>	    $dm{"ec_ep"},
                'signes_fonctionnelles'=>	    $dm{"signes_fonctionnelles"},
                'signes_examen_physique'=>    $dm{"signes_examen_physique"},
                'hypothese'=>	    $dm{"hypothese"},
                'examen_complementaires'=>	    $dm{"examen_complementaires"},
                'fichier_dm'=> $dm{"fichier_dm"},
        ]);

       

                $dossier_medical->save();

                $bdd = DB::connection('mysql2')->getPdo();
                $query="SELECT MAX(id_dm) FROM dossier_medical " ;

                $req = $bdd->query("$query");
                $res = (array)$req->fetch(PDO::FETCH_OBJ);
                $id_of_last_insert_dossier_medical = $res{"MAX(id_dm)"};

                $last_insert_dossier_medical = Dossier_medical::find($id_of_last_insert_dossier_medical);
                $id_patient =  $last_insert_dossier_medical->num_patient;
                $id_dm = $last_insert_dossier_medical->id_dm;
                
                DB::connection('mysql2')->table('patient')
               ->where('num_patient',$id_patient)
               ->update(['num_dossier'=> $id_dm]);

               $result = Patient::all();

               $patients = $result->sortByDesc('num_patient');

    return view('gestionPatient.saisieDonneMedical_index',compact('patients'));
        
       


    }

    public function show_update(Request $request) {




        $num_patient = $request->get('num_patient');
        $num_dossier = $request->get('num_dossier');
        $dossier_medical = Dossier_medical::find($num_dossier);

        if(!isset($dossier_medical)){

            return view('gestionPatient.saisieDonneMedical_erreur',compact('num_patient'));
        };

        $patient = Patient::find($num_patient);

       return view('gestionPatient.saisieDonneMedical_update',compact('patient','dossier_medical'));
   }
/**begin modification */
    public function update(Request $request){

       

        $num_patient=$request->get('num_patient');
        $patient = Patient::find($num_patient);
/**tracker l'erreur d'incoherence table patient et table dossier_medical */




            $dm = array(
                'id_dm' => $request->get('id_dm'),
                'date_dm' => 	$request->get('date_dm'),
                'num_patient'=>	 $patient->num_patient,   
                'nom_patient'=>	 $patient->nom_patient,
                'prenom_patient'=> $patient->prenom_patient,
                'date_naissance_patient'=> 	$request->get('date_naissance_patient'),    
                'sexe_patient'=> $patient->sexe,	    
                'nationalite_patient'=>	$request->get('nationalite_patient'), 
                'adresse_patient'=>	 $patient->adresse,
                'profession_patient'=>	$request->get('profession_patient'),   
                'motifs'=> $request->get('motifs'),
                	    
                'histoire_maladie'=> $request->get('histoire_maladie'),	    
                'atcd_tfr'=>	    $request->get('atcd_tfr'),
                'atcd_med'=>	    $request->get('atcd_med'),
                'atcd_ht'=>	    $request->get('atcd_ht'),
               'atcd_chir'=>	    $request->get('atcd_chir'),
                'atcd_obs'=>	    $request->get('atcd_obs'),
                'atcd_fam'=>	    $request->get('atcd_fam'),
                'ec_etat_general'=>	    $request->get('ec_etat_general'),
                'ec_trois_signes'=>	    $request->get('ec_trois_signes'),
                'ec_facies'=>	    $request->get('ec_facies'),
                'ec_md'=>	    $request->get('ec_md'),
                'ec_ta'=>	    $request->get('ec_ta'),
                'ec_fc'=>	    $request->get('ec_fc'),
                'ec_fr'=>	    $request->get('ec_fr'),
                'ec_diurese'=>	$request->get('ec_diurese'),
                'ec_ec'=>	    $request->get('ec_ec'),
                'ec_ehc'=>	    $request->get('ec_ehc'),
                'ec_ep'=>	    $request->get('ec_ep'),
                'signes_fonctionnelles'=>	    $request->get('signes_fonctionnelles'),
                'signes_examen_physique'=>    $request->get('signes_examen_physique'),
                'hypothese'=>	    $request->get('hypothese'),
                'examen_complementaires'=>	    $request->get('examen_complementaires'),
                'fichier_dm'=> 0,

            );

            function modifier( $input_name,array $dossier_medical ){
                $input_value = $dossier_medical{"$input_name"};
                $id_dm = $dossier_medical{'id_dm'};
               
                        
                           
                         if(isset($input_value))
                                {
                                    $bdd = DB::connection('mysql2')->getPdo();
                                    $query = "UPDATE dossier_medical SET $input_name = '$input_value' WHERE id_dm = '$id_dm'";
                                    
                           $bdd->exec($query);
            
                                }
            
            
                            }


                        modifier('date_dm',$dm);
                        modifier('date_naissance_patient',$dm);
                        modifier('nationalite_patient',$dm);
                        modifier('profession_patient',$dm);
                        modifier('motifs',$dm);
                        modifier('histoire_maladie',$dm);
                        modifier('atcd_tfr',$dm);
                        modifier('atcd_med',$dm);

                        modifier('atcd_ht',$dm);
                        modifier('atcd_chir',$dm);
                        modifier('atcd_obs',$dm);
                        modifier('atcd_fam',$dm);
                        modifier('ec_etat_general',$dm);
                        modifier('ec_trois_signes',$dm);
                        modifier('ec_facies',$dm);
                        modifier('ec_md',$dm);
                        modifier('ec_ta',$dm);
                        modifier('ec_fc',$dm);
                        modifier('ec_fr',$dm);
                        modifier('ec_diurese',$dm);
                        modifier('ec_ec',$dm);
                        modifier('ec_ehc',$dm);
                        modifier('ec_ep',$dm);
                        modifier('signes_fonctionnelles',$dm);
                        modifier('signes_examen_physique',$dm);
                        modifier('hypothese',$dm);
                        modifier('examen_complementaires',$dm);
                        modifier('fichier_dm',$dm);

                    /**end modification */

                    $result = Patient::all();

                    $patients = $result->sortByDesc('num_patient');

                    return view('gestionPatient.saisieDonneMedical_index',compact('patients'))->withSuccess('Le dossier medical a éte bie modifié!');

     



    }
//endupdate



public function recherche(Request $request){

    $bdd = DB::connection('mysql2')->getPdo();
    $recherche = $request->get('recherche');

    $query="SELECT *  FROM patient WHERE  MATCH(nom_patient,prenom_patient,num_patient,date_arrive,tel,adresse) AGAINST ('$recherche'IN BOOLEAN MODE) ORDER BY date_arrive DESC" ;



    $req = $bdd->query("$query");

    

    $patients = $req->fetchall(PDO::FETCH_OBJ);



return view('gestionPatient.saisieDonneMedical_index',compact('patients'));
}
//end function recherche


















}
