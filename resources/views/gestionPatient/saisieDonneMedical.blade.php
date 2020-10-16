
@extends('layouts.app')

@section('content')

      <section class="wrapper">
<div class="row mt">
            <div class="col-lg-12">
                
              <div class="row">
              <div class="col-md-6">
              <h4 class = "text-center"> Veuillez saisir les donnes medical du patient : </h4>
              
              </div>

              <div class="col-md-6">
              <h4 class = "text text-warning "> {{$patient->nom_patient}} {{$patient->prenom_patient}} </h4>
              
              </div>
              </div>
              
              
              
              
              
              
              <form method = "post" action="{{route('saisieDonneMedicalStore')}}">
              @csrf
    <div class="form-group col-md-4">
        
        <label for="num_patient">Numéro du patient:</label>
        <input type="text" class="form-control" name="num_patient" value = "{{$patient->num_patient}}"readonly>
    </div>
     
    <div class="form-group col-md-4">
        
        <label for="date_naissance_patient">Date de naissance:</label>
        <input type="date" class="form-control" name="date_naissance_patient"/>
    </div>

    <div class="form-group col-md-4 ">
        
        <label for="nationalite_patient">Nationalite</label>
        <input type="text" class="form-control" name="nationalite_patient"/>
    </div>
    
    <div class="form-group col-md-4 ">
        
        <label for="profession_patient">Profession</label>
        <input type="text" class="form-control" name="profession_patient"/>
    </div>

    <div class="form-group col-md-4">
        <label for="motifs"> Motifs:</label>
        <textarea type="text" class="form-control" name="motifs"> </textarea>
    </div>

    

    <div class="form-group col-md-4 ">
        <label for="histoire_maladie"> Histoire maladie:</label>
        <textarea type="text" class="form-control" name="histoire_maladie"> </textarea>
    </div>
    


    <div class="form-group col-md-4 ">
        <label for="atcd_ht">atcd_ht:</label>
        <input type="text" class="form-control" name="atcd_ht"/>
    </div>
    <div class="form-group col-md-4 ">
        <label for="ec_trois_signes">ec_trois_signes:</label>
        <input type="text" class="form-control" name="ec_trois_signes"/>
    </div>
    <div class="form-group col-md-4 ">
        <label for="ec_fr">ec_fr:</label>
        <input type="text" class="form-control" name="ec_fr"/>
    </div>
    <div class="form-group col-md-4">
        <label for="ec_diurese">ec_diurese:</label>
        <textarea type="text" class="form-control" name="ec_diurese"> </textarea>
    </div>
    
    <div class="form-group col-md-4">
        <label for="atcd_tfr">atcd_tfr:</label>
        <textarea type="text" class="form-control" name="atcd_tfr"> </textarea>
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_med">atcd_med:</label>
        <textarea type="text" class="form-control" name="atcd_med"> </textarea>
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_chir">atcd_chir:</label>
        <input type="text" class="form-control" name="atcd_chir"/>
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_obs">atcd_obs:</label>
        <input type="text" class="form-control" name="atcd_obs"/>
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_fam">atcd_fam:</label>
        <input type="text" class="form-control" name="atcd_fam"/>
    </div>

    <div class="form-group col-md-4">
        <label for="ec_etat_general">ec_etat_general:</label>
        <input type="text" class="form-control" name="ec_etat_general"/>
    </div>

    <div class="form-group col-md-4">
        <label for="ec_facies"> ec_facies:</label>
        <input type="text" class="form-control" name="ec_facies"/>
    </div>

<div class="form-group col-md-4">
        <label for="ec_md"> ec_md:</label>
        <input type="text" class="form-control" name="ec_md"/>
    </div>

    <div class="form-group col-md-4">
        <label for="ec_ta">ec_ta:</label>
        <input type="text" class="form-control" name="ec_ta"/>
    </div>

    <div class="form-group col-md-4">
        <label for="ec_fc">ec_fc:</label>
        <input type="text" class="form-control" name="ec_fc">
    </div>

    

<div class="form-group col-md-4">
        <label for="ec_ec">ec_ec:</label>
        <input type="text" class="form-control" name="ec_ec"/>
    </div>


    <div class="form-group col-md-4">
        <label for="ec_ehc">ec_ehc:</label>
        <input type="text" class="form-control" name="ec_ehc"/>
    </div>
    
    <div class="form-group col-md-4">
        <label for="ec_ep">ec_ep:</label>
        <input type="text" class="form-control" name="ec_ep"/>
    </div>

    <div class="form-group col-md-4">
        <label for="signes_examen_physique">signes_examen_physique:</label>
        <input type="text" class="form-control" name="signes_examen_physique"/>
    </div>
    
    <div class="form-group col-md-4">
        <label for="signes_fonctionnelles">signes_fonctionnelles:</label>
        <textarea type="text" class="form-control" name="signes_fonctionnelles"> </textarea>
    </div>

    

    <div class="form-group col-md-4">
        <label for="hypothese">hypothese:</label>
        <textarea type="text" class="form-control" name="hypothese"> </textarea>
    </div>

    <div class="form-group col-md-4">
        <label for="examen_complementaires">examen_complementaires:</label>
        <textarea type="text" class="form-control" name="examen_complementaires"> </textarea>
     </div>

     <div class="form-group col-md-4">
        <label for="valider">Creation dossier madical ?</label>
        <button class =" form-control btn btn-primary" type="submit"  id = "valider"> ok,valider! </butto>
     </div>
            
 
 </form>
          </div>
</div>
</section>

          @endsection

          