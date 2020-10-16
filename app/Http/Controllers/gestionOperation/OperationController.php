<?php

namespace App\Http\Controllers\gestionOperation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Operation;
class OperationController extends Controller
{
    public function index(){
return view('gestionOperation.formulaireInsertionOperation');
    }

    public function operationStore(Request $request){
        $operation = new Operation([
            'id_op'                 =>$request->get('id_op' ),
        'date_op'                   =>$request->get( 'date_op' ),
        'num_patient'               =>$request->get('num_patient'),
        'nom_patient'               =>$request->get('nom_patient'),
        'date_naissance_patient'    =>$request->get('date_naissance_patient'),
        'prenom_patient'            =>$request->get('prenom_patient' ),
        'sexe_patient'              =>$request->get('sexe_patient' ),
        'operateur1'                =>$request->get('operateur1' ),
        'operateur2'                =>$request->get('operateur2'),
        'operateur3'                =>$request->get('operateur3' ),
        'operateur4'                =>$request->get('operateur4'),
        'anesthesiste1'             =>$request->get( 'anesthesiste1'),
        'anesthesiste2'             =>$request->get( 'anesthesiste2'),
        'infirmier1'                =>$request->get('infirmier1'),
        'infirmier2'                =>$request->get('infirmier2'),
        'anesthesiste3'             =>$request->get('anesthesiste3'),
        'anesthesiste4'             =>$request->get('anesthesiste4'),
        'infirmier3'                =>$request->get('infirmier3'),
        'infirmier4'                =>$request->get('infirmier4'),
        'type_intervention'         =>$request->get('type_intervention' ),
        'nombre_ko'                 =>$request->get('nombre_ko' ),
        'indication'                =>$request->get('indication' ),
        'heure_entree'              =>$request->get('heure_entree' ),
        'heure_debut_op'            =>$request->get('heure_debut_op'),
        'heure_fin_op'              =>$request->get('heure_fin_op'),
        'heure_sortie'              =>$request->get('heure_sortie' ),
        'actes_op'                  =>$request->get('actes_op'),
        'consignes_part'            =>$request->get('consignes_part'),
        ]);
        
        $operation->save();
        return 'insertion nouvell patien à opérer bien effectué';
    }
    
}
