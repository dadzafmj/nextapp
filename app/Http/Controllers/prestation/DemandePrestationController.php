<?php

namespace App\Http\Controllers\prestation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prestation;
use App\Patient;
use DB;
use PDO;
use App\Prestpatient;

class DemandePrestationController extends Controller
{
	   public function prestationForSelectedClient(Request $request,$id){

		
		$patient= Patient::find($id);
		$recherche = $request->get('recherche');
		if(isset($recherche )){

			$bdd = DB::connection('mysql2')->getPdo();
        

        $query="SELECT *  FROM prestations WHERE  MATCH(nom_prestation) AGAINST ('$recherche' in boolean mode)" ;



        $req = $bdd->query("$query");

        

        $prestations = $req->fetchall(PDO::FETCH_OBJ);

		}
		else
		{
			$prestations= Prestation::all();  

		};



		
		/**on selection l'id de  tous les trace de prestation si le numeros de patient en question n'a pas encore regle sa facture (etat facture =0) */
		$numpatient = $id  ;  
		
		$results = DB::connection('mysql2')->select('select * from make_facture_prestpatient where etat_facturation = :etat_facturation AND num_patient =:num_patient ', ['etat_facturation' => 0,  'num_patient' => $numpatient ]);
		
		
		if(isset($results))
		{
			if($results != Null)
			{
				
		
			

								$i=0;
								
								foreach($results as $result){

									$ID[$i] = "$result->idprest";
									
									$i++;
									};
									
						/**o selectionne le prestation selon l'id remplis le condition dont: cette prestation est effectuer par le client en question et l'etat de facturation à 0   */
									$lastPrestations = DB::connection('mysql2')
									->table('prestpatient')
									->wherein('idprest',$ID)->get();
						
								/**------------------------End selection ----- */


					/** Total tu prix du prestation */
										
					$montantTotal=0;
					if (isset($lastPrestations))  {
						foreach($lastPrestations as $lastPrestation){

							$montantTotal = $montantTotal +$lastPrestation->prix_prest;  
						
						}
						
					}               



							return view('gestionPrestation.prestationForSelectedClient',compact('prestations','patient','lastPrestations','montantTotal'));
						} //end if
					} //end if

					//$prestations=Prestation::all();
					$patient = Patient::find("$numpatient");
	
					return view('gestionPrestation.prestationForSelectedClient',compact('prestations','patient'));
	
	
	}
}
