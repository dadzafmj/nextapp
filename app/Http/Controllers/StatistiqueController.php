<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use PDF;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class StatistiqueController extends Controller {
        public function getStatistique(){

        /*   try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=bd_clinique', 'root','');
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }
                */
                $bdd=DB::connection('mysql2')->getPdo();

           $query='SELECT * FROM `facture`';
            
            $reponse = $bdd->query("$query");
            
            
            
                $data=$reponse->fetchall(PDO::FETCH_OBJ);
                

        return view('statistique',compact('data'));
            
            
        }




        public function generatePDF()
        {
            $data = ['title' => 'Welcome to HDTuto.com'];
            $pdf = Pdf::loadView('myPDF', $data);
      
            return $pdf->download('statistique.pdf');
        }


       


 }
    
