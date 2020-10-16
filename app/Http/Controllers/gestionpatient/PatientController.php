<?php

namespace App\Http\Controllers\gestionpatient;
use App\Http\Controllers\Controller;
use App\Patient;

use Carbon;

use DB;


use Illuminate\Http\Request;
use PDO;
use App\Docteur;
use App\Unite_admission;
use Illuminate\Pagination\Paginator;
class PatientController extends Controller
{

    public function recherche(Request $request)
    {

        $bdd = DB::connection('mysql2')->getPdo();
        $recherche = $request->get('recherche');

        $query="SELECT *  FROM patient WHERE  MATCH(nom_patient,prenom_patient,num_patient,date_arrive,tel,adresse) AGAINST ('$recherche'IN BOOLEAN MODE) ORDER BY date_arrive DESC" ;



        $req = $bdd->query("$query");

        

        $patients = $req->fetchall(PDO::FETCH_OBJ);
       

        return view('gestionPatient.prestationFonctionaire.index',compact('patients'));



    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bdd = DB::connection('mysql2')->getPdo();

        $query='SELECT *  FROM `patient` ORDER BY num_patient DESC' ;



        $req = $bdd->query("$query");

        

        $patients = $req->fetchall(PDO::FETCH_OBJ);
       

        return view('gestionPatient.prestationFonctionaire.index',compact('patients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        
        $docteurs = Docteur::all();
        return view('gestionPatient.prestationFonctionaire.insertionPatient',compact( 'docteurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

/** insertion nouvel patient avec illustration de champs obligatoire selon les parametre 
 *  $request->validate(['parametre'=> 'valeur'])
 * avec parametre c'est le nom de champ dans le formulaire et valeur le requirement
 */
    public function store(Request $request)
    {



        $request->validate([
            'nom_patient' => 'required|max:255',
            
            'sexe' => 'required|max:255',
            'age' => 'required|max:255',
            'adresse' => 'required|max:255',
           
           
            
           
        ]);

        
/**initialisation de variable patient */
        $data = array(
            'num_court'=>'0',
            'nom_patient' => '0',
            'prenom_patient' => NULL,
            'sexe' => '0',
            'age' => '0',
            'adresse' => '0',
            'date_complet' => NULL,
            'num_dossier' => '0',
            'tel' => '0',
            'medecin_prescripteur' => '0',
            /*date*/
            'date_arrive' => NULL,
            'jour_A'=> '0',
            'mois_A'=> '0',
            'annee_A'=> '0',


            'date_remise' => NULL,

            'jour_R'=> '0',
            'mois_R'=> '0',
            'annee_R'=> '0',


            'lien_parente' => '0',
            'unite_age'=>  '0',
           
            'nom_agent'=>  '0',
            'prenom_agent'=>  '0',
            'sexe_agent'=> '0',
            'im_agent'=>  '0',
            'adresse_agent'=> '0',
            'service_employeur'=>  '0',
            'num_visa'=>  '0',
            'date_visa'=> NULL,
            'signataire_visa'=> '0',
            'fonction_signataire'=>  '0',
            'nomfichier'=>  '0',
            'hospitalisation'=>  '0',
            'unite_admission'=> '0',
            'etat_patient'=>  '0',
            'diagnostic_accueil'=>  '0',
            'diagnostic_sortie'=>  '0',
            'chambre_patient'=>  '0',
            'lit_patient'=>  '0',
            'categorie_patient'=>  '0',
            'date_hospitalisation'=> NULL,
            'decision_sortie'=>  '0',
            'date_sortie'=> NULL,
            'hospitalisation' => '0',

        );
$dateArive = new Carbon($request->get('date_arrive'));





      /** recuperation des donnés provient de formulaire insertion patient */


        $data{'nom_patient'}  =   $request->get('nom_patient');
        $data{'prenom_patient'}  =   $request->get('prenom_patient');
        $data{'sexe'}  =   $request->get('sexe');
        $data{'age'}  =   $request->get('age');
        $data{'unite_age'}  =   $request->get('unite_age');
        $data{'adresse'}  =   $request->get('adresse');
        $data{'tel'}  =   $request->get('tel');
        $data{'medecin_prescripteur'}  =   $request->get('medecin_prescripteur');

        $data{'date_arrive'} = $dateArive->format('d-m-yy');

        $data{'jour_A'}    = $dateArive->format('d'); 
        $data{'mois_A'}    = $dateArive->format('m'); 
        $data{'annee_A'}   = $dateArive->format('yy'); 
        $data['lien_parente'] = $request->get('lien_parente');





            /** calcul num_court */

            $bdd = DB::connection('mysql2')->getPdo();
            $query="SELECT MAX(num_patient) FROM patient as test " ;
                                 
                                 $req = $bdd->query("$query");
                                 $res = (array)$req->fetch(PDO::FETCH_OBJ);
                                 $num_of_last_insert_patient = $res{"MAX(num_patient)"};
                                
                                
                                
            $query1="SELECT  num_court, mois_A, annee_A FROM patient WHERE num_patient = $num_of_last_insert_patient ";
            $req1 = $bdd->query("$query1");
            
            $last_insert_patient = $req1->fetch(PDO::FETCH_OBJ);
           
            $last_num_court= $last_insert_patient->num_court;

            $last_month = $last_insert_patient->mois_A;
            $last_year = $last_insert_patient->annee_A;

            $val1 = 30*$last_month+360*($last_year-2000);
            $val2 = 30*$data{'mois_A'} +360*($data{'annee_A'}-2000);

            if($val1>=$val2)
                {
                $numero = $last_num_court+1;
                }
            else
                {
                $numero = 1;
                }


                $data{'num_court'} = $numero;
                $nomfichier = '../archive/resultat/n_'.$data{'num_court'}.'_'. $data{'jour_A'}.'_'.$data{'mois_A'}.'.pdf';
                $data{'nomfichier'} = $nomfichier;
       
/** insertion dan la base de donne le valeur via le formulaire */

        $patient = new Patient([
           
            'num_court'=> $data{'num_court'} ,
            'nom_patient' => $data{'nom_patient'},
            'prenom_patient' => $data{'prenom_patient'},
            'sexe' => $data{'sexe'},
            'age' => $data{'age'},
            'adresse' => $data{'adresse'},
            'date_complet' => $data{'date_complet'},
            'num_dossier' => $data{'num_dossier'},
            'tel' => $data{'tel'},
            'medecin_prescripteur' => $data{'medecin_prescripteur'},
            /*date*/
            'date_arrive' => $data{'date_arrive'},
            'jour_A'=> $data{'jour_A'},
            'mois_A'=>  $data{'mois_A'},
            'annee_A'=> $data{'annee_A'},


            'date_remise' => $data{'date_remise'},

            'jour_R'=> $data{'jour_R'},
            'mois_R'=> $data{'mois_R'},
            'annee_R'=> $data{'annee_R'},


            'lien_parente' => $data{'lien_parente'},
            'unite_age'=>  $data{'unite_age'},
            'date_complet'=>  $data{'date_complet'},
            'nom_agent'=> $data{'nom_agent'},
            'prenom_agent'=>  $data{'prenom_agent'},
            'sexe_agent'=> $data{'sexe_agent'},
            'im_agent'=>  $data{'im_agent'},
            'adresse_agent'=> $data{'adresse_agent'},
            'service_employeur'=>  $data{'service_employeur'},
            'num_visa'=>  $data{'num_visa'},
            'date_visa'=>  $data{'date_visa'},
            'signataire_visa'=>  $data{'signataire_visa'},
            'fonction_signataire'=>  $data{ 'fonction_signataire'},
            'nomfichier'=>  $data{'nomfichier'},
            'hospitalisation'=>  $data{'hospitalisation'},
            'unite_admission'=>  $data{'unite_admission'},
            'etat_patient'=>  $data{'etat_patient'},
            'diagnostic_accueil'=>  $data{'diagnostic_accueil'},
            'diagnostic_sortie'=>  $data{'diagnostic_sortie'},
            'chambre_patient'=>  $data{'chambre_patient'},
            'lit_patient'=>  $data{ 'lit_patient'},
            'categorie_patient'=>  $data{'categorie_patient'},
            'date_hospitalisation'=>  $data{'date_hospitalisation'},
            'decision_sortie'=> $data{ 'decision_sortie'},
            'date_sortie'=>  $data{'date_sortie'},
            'hospitalisation' => $data{'hospitalisation'},

        ]);
        /**sauver l'action d'insertion */


       






                        $patient->save();

                        $bdd = DB::connection('mysql2')->getPdo();
                        $query='SELECT num_court, num_patient,nom_patient,prenom_patient ,lien_parente,sexe, adresse FROM `patient` WHERE num_patient = LAST_INSERT_ID()' ;
                                                
                        $req = $bdd->query("$query");
                        $last_insert_patient= $req->fetch(PDO::FETCH_OBJ);


                        $unite_admissions = Unite_admission::all();
                       
                        $check_sex_agent =array(
                            'masculin' =>'',
                            'feminin' => ''
                        );

                        if($last_insert_patient->lien_parente == 'a'){


                            if($last_insert_patient->sexe == 'M')
                            {
                                $check_sex_agent{'masculin'}= 'checked';
    
                            };
    
                            if($last_insert_patient->sexe == 'F')
                            {
                                $check_sex_agent{'feminin'}= 'checked';
    
                            };


                        }
                        $check_sex_agent = (object)$check_sex_agent;
                      
       return view('gestionPatient.prestationFonctionaire.insertionHospitalisation',compact('last_insert_patient','unite_admissions','check_sex_agent'));
    }



    



/** enregistrement donne medical de patient */


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
            $num_patient= $request->get('num_patient');
   

            $hospitalisation = $request->get('hospitalisation');
            if(isset($hospitalisation))
                {
                    $bdd = DB::connection('mysql2')->getPdo();
                    $query = "UPDATE patient SET hospitalisation = '$hospitalisation' WHERE num_patient = '$num_patient'";
                    
                
                    
                    $bdd->exec($query);

                   // $users =DB::connection('mysql2')->select('select * from patient where num_patient = ?', [$num_patient]);
                   // dd($users);
                }


            $unite_admission = $request->get('unite_admission');
            if(isset($unite_admission))
                {
                    $bdd = DB::connection('mysql2')->getPdo();
                    $query = "UPDATE patient SET unite_admission = '$unite_admission' WHERE num_patient = '$num_patient'";
                    
                
                    
                    $bdd->exec($query);

                  //$users =DB::connection('mysql2')->select('select * from patient where num_patient = ?', [$num_patient]);
                  // dd($users);
                }


                $date_hospitalisation = $request->get('date_hospitalisation');
                if(isset($date_hospitalisation))
                    {
                        $bdd = DB::connection('mysql2')->getPdo();
                        $query = "UPDATE patient SET date_hospitalisation = '$date_hospitalisation' WHERE num_patient = '$num_patient'";
                        
                    
                        
                        $bdd->exec($query);
    
                      //$users =DB::connection('mysql2')->select('select * from patient where num_patient = ?', [$num_patient]);
                      // dd($users);
                    }


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

               
              
             
                modifier('categorie_patient',$request);
                modifier('chambre_patient',$request);
                modifier('lit_patient',$request);
                modifier('etat_patient',$request);
                modifier('diagnostic_accueil',$request);
/**update agent fonctionaire */
                modifier('nom_agent',$request);
                modifier('prenom_agent',$request);
                modifier('sexe_agent',$request);
                modifier('im_agent',$request);
                modifier('adresse_agent',$request);
                modifier('service_employeur',$request);
                modifier('num_visa',$request);
                modifier('signataire_visa',$request);
                modifier('fonction_signataire',$request);
                modifier('date_visa',$request);



              return  redirect()->route('listPatient');


















       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
