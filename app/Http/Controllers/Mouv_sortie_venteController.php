<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mouv_sortie_vente;
use Illuminate\Pagination\Paginator;
class Mouv_sortie_venteController extends Controller
{
  
    
    public function index(Request $Request){
    	
		$doss_patient = $Request->get('doss_patient');
    	


    	
    			$data = Mouv_sortie_vente::where('doss_patient',$doss_patient)->get();
        
       		 	return view('mouv_sortie_vente.index',compact('data','doss_patient'));
    	
    	
        
    }

    
    
    
    
    
    
}
