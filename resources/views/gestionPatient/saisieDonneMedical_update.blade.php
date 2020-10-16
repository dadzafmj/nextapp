
@extends('layouts.app')

@section('content')

      <section class="wrapper">
<div class="row mt">
            <div class="col-lg-12">
                
              <div class="row">
              <div class="col-md-6">
              <h4 class = "text-center"> Veuillez modifier les donnes medical du patient : </h4>
              
              </div>

              <div class="col-md-6">
              <h4 class = "text text-danger "> {{$patient->nom_patient}} {{$patient->prenom_patient}} </h4>
              
              </div>
              </div>
              
              
              
              
              
              
              <form method = "post" action="{{route('saisieDonneMedicalUpdateStore')}}">
              @csrf

<div class="row">
<div class="form-group col-md-4">

<label for="num_patient">Numéro dossier medical:</label>
<input type="text" class="form-control " name="id_dm" value = "{{$patient->num_dossier}}"readonly>
</div>
<div class="form-group col-md-4">
        
        <label for="date_naissance_patient">Date dossier medical: {{$dossier_medical->date_naissance_patient}}</label>
        <input type="date" class="form-control" name="date_dm"/>
    </div>



<div class="form-group col-md-4">

<label for="num_patient">Numéro du patient:</label>
<input type="text" class="form-control" name="num_patient" value = "{{$patient->num_patient}}"readonly>
</div>

</div>
     
    
    
    <div class="form-group col-md-4">
        
        <label for="date_naissance_patient">Date de naissance patient: {{$dossier_medical->date_naissance_patient}}</label>
        <input type="date" class="form-control" name="date_naissance_patient"/>
    </div>
    
    

    <div class="form-group col-md-4 ">
        
        <label for="nationalite_patient">Nationalite</label>
        <input type="text" class="form-control" name="nationalite_patient" value = "{{$dossier_medical->nationalite_patient}}" >
    </div>
    
    <div class="form-group col-md-4 ">
        
        <label for="profession_patient">Profession</label>
        <input type="text" class="form-control" name="profession_patient" value = "{{$dossier_medical->profession_patient}}">
    </div>

    <div class="form-group col-md-4">
        <label for="motifs"> Motifs:</label>
        <textarea type="text" class="form-control" name="motifs" value = "{{$dossier_medical->motifs}}"> {{$dossier_medical->motifs}}</textarea>
    </div>

    

    <div class="form-group col-md-4 ">
        <label for="histoire_maladie"> Histoire maladie:</label>
        <textarea type="text" class="form-control" name="histoire_maladie" value = "{{$dossier_medical->histoire_maladie}}"> {{$dossier_medical->histoire_maladie}}</textarea>
    </div>
    


    <div class="form-group col-md-4 ">
        <label for="atcd_ht">atcd_ht:</label>
        <input type="text" class="form-control" name="atcd_ht" value = "{{$dossier_medical->atcd_ht}}">
    </div>
    <div class="form-group col-md-4 ">
        <label for="ec_trois_signes">ec_trois_signes:</label>
        <input type="text" class="form-control" name="ec_trois_signes" value = "{{$dossier_medical->ec_trois_signes}}">
    </div>
    <div class="form-group col-md-4 ">
        <label for="ec_fr">ec_fr:</label>
        <input type="text" class="form-control" name="ec_fr" value = "{{$dossier_medical->ec_fr}}">
    </div>
    <div class="form-group col-md-4">
        <label for="ec_diurese">ec_diurese:</label>
        <textarea type="text" class="form-control" name="ec_diurese" value = "{{$dossier_medical->ec_diurese}}"> {{$dossier_medical->ec_diurese}}</textarea>
    </div>
    
    <div class="form-group col-md-4">
        <label for="atcd_tfr">atcd_tfr:</label>
        <textarea type="text" class="form-control" name="atcd_tfr" value = "{{$dossier_medical->atcd_tfr}}" > {{$dossier_medical->atcd_tfr}}</textarea>
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_med">atcd_med:</label>
        <textarea type="text" class="form-control" name="atcd_med" value = "{{$dossier_medical->atcd_med}}" >{{$dossier_medical->atcd_med}} </textarea>
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_chir">atcd_chir:</label>
        <input type="text" class="form-control" name="atcd_chir" value = "{{$dossier_medical->atcd_chir}}">
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_obs">atcd_obs:</label>
        <input type="text" class="form-control" name="atcd_obs" value = "{{$dossier_medical->atcd_obs}}">
    </div>

    <div class="form-group col-md-4">
        <label for="atcd_fam">atcd_fam:</label>
        <input type="text" class="form-control" name="atcd_fam" value = "{{$dossier_medical->atcd_fam}}">
    </div>

    <div class="form-group col-md-4">
        <label for="ec_etat_general">ec_etat_general:</label>
        <input type="text" class="form-control" name="ec_etat_general" value = "{{$dossier_medical->ec_etat_general}}">
    </div>

    <div class="form-group col-md-4">
        <label for="ec_facies"> ec_facies:</label>
        <input type="text" class="form-control" name="ec_facies" value = "{{$dossier_medical->ec_facies}}">
    </div>

<div class="form-group col-md-4">
        <label for="ec_md"> ec_md:</label>
        <input type="text" class="form-control" name="ec_md"value = "{{$dossier_medical->ec_md}}">
    </div>

    <div class="form-group col-md-4">
        <label for="ec_ta">ec_ta:</label>
        <input type="text" class="form-control" name="ec_ta" value = "{{$dossier_medical->ec_ta}}">
    </div>

    <div class="form-group col-md-4">
        <label for="ec_fc">ec_fc:</label>
        <input type="text" class="form-control" name="ec_fc" value = "{{$dossier_medical->ec_fc}}">
    </div>

    

<div class="form-group col-md-4">
        <label for="ec_ec">ec_ec:</label>
        <input type="text" class="form-control" name="ec_ec" value = "{{$dossier_medical->ec_ec}}">
    </div>


    <div class="form-group col-md-4">
        <label for="ec_ehc">ec_ehc:</label>
        <input type="text" class="form-control" name="ec_ehc" value =" {{$dossier_medical->ec_ehc}}">
    </div>
    
    <div class="form-group col-md-4">
        <label for="ec_ep">ec_ep:</label>
        <input type="text" class="form-control" name="ec_ep" value = "{{$dossier_medical->ec_ep}}">
    </div>

    <div class="form-group col-md-4">
        <label for="signes_examen_physique">signes_examen_physique:</label>
        <input type="text" class="form-control" name="signes_examen_physique" value = "{{$dossier_medical->signes_examen_physique}}">
    </div>
    
    <div class="form-group col-md-4">
        <label for="signes_fonctionnelles">signes_fonctionnelles:</label>
        <textarea type="text" class="form-control" name="signes_fonctionnelles" value = "{{$dossier_medical->signes_fonctionnelles}}"> {{$dossier_medical->signes_fonctionnelles}}</textarea>
    </div>

    

    <div class="form-group col-md-6">
        <label for="hypothese">hypothese:</label>
        <textarea type="text" class="form-control" name="hypothese" value = "{{$dossier_medical->hypothese}}"> {{$dossier_medical->hypothese}}</textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="examen_complementaires">examen_complementaires:</label>
        <textarea type="text" class="form-control" name="examen_complementaires" value = "{{$dossier_medical->examen_complementaires}}"> {{$dossier_medical->examen_complementaires}}</textarea>
     </div>

     <div class="row">
     <div class="form-group col-md-6"></div>
     <div class="inlin-form col-md-6">
        <span class = "text text-warning">Creation dossier madical ?</span> </br>
        <button class ="  btn btn-primary text text-center" type="submit"  id = "valider"> ok,valider! </butto>
     </div>
     
     
     </div>
            
 
 </form>
          </div>
</div>
</section>

          @endsection

          