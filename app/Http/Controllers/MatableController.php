<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatableController extends Controller
{
    public function afficher() {

    	$matable= \App\Matable::all();
 
        return view('Matable.gist',compact('matable'));
    }
}
