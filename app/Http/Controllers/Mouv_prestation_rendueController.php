<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mouv_prestation_rendueController extends Controller
{
    public function index(){
 
        $Mouv_prestation_rendue = \App\Mouv_prestation_rendueModel::all();
 
        return view('Mouv_prestation_rendue.index',compact('Mouv_prestation_rendue'));
    }
}
