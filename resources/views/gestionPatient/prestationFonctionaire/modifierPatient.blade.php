@extends('layouts.app')

@section('content')

<section class="wrapper">
  
            <h3 class="text text-warning text-center" >  Veuillez modifier  les informations du patient </h2>

            <div class="row mt">
              
              
            <div class="col-lg-12">
            <form method = "post" action="{{ route('modifierPatient.store') }}">
            @csrf
            <input type = "hidden" name = "num_patient" value = "{{$patient->num_patient}}">
            <div class="form-row">

              <div class="form-group col-md-6">

                <label class="col-form-label text text-light" for="nom_patient">Nom du patient : {{$patient->nom_patient}}</label>
                <input type="text" class="form-control" id="nom_patient" name ="nom_patient"  >

              </div>

              <div class="form-group col-md-6">

                <label class="col-form-label "for="prenom_patient">Prénom du patient : {{$patient->prenom_patient}} </label>
                <input type="text" class="form-control" id="prenom_patient" name = "prenom_patient" >

              </div>

              


            </div>

            <div class="form-row">
            
              <div class="form-group col-md-2">
              
                <label class="col-form-label ">Sexe du patient : {{$patient->sexe}}</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexe" id="sexe_masculin" value="M" >
                  <label class="form-check-label" for="sexe_masculin">
                    Masculin
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexe" id="sexe_feminin" value="F" >
                  <label class="form-check-label" for="sexe_feminin">
                    Féminin
                </label>
                </div>
              
              </div>

              <div class="form-group col-md-2">
              
                <label class="col-form-label text text-light" for="age">Age du patient : {{$patient->age}}</label>
                <input type="text" class="form-control" id="age" name ="age" >
              
              </div>

              <div class="form-group col-md-2">
              
                <label  for="unite_age"> Unite age : {{$patient->unite_age}}</label>
                <select class="form-control" id="unite_age" name = "unite_age">
                <option> </option>
                  <option value ="ans">ans</option>
                  <option value="mois">mois</option>
                  <option value="jour">jour</option>

                </select>
              </div>


              <div class="form-group col-md-3">

                <label class="col-form-label text text-light" for="adresse">Adresse du patient : {{$patient->adresse}}</label>
                <input type="text" class="form-control" id="adresse" name ="adresse" >

              </div>

              <div class="form-group col-md-3">

                <label class="col-form-label text text-light" for="tel">Numero telephone du patient: {{$patient->tel}} </label>
                <input type="text" class="form-control" id="tel" name ="tel" >

              </div>



            </div>
            
            <div class="form-row col-md-12">


            </div>

            <div class="form-row">


            


              <div class="form-group col-lg-6">
             
              <label for="medecin_prescripteur">medecin_prescripteur: {{$patient->medecin_prescripteur}}</label>
                <select  class="form-control" name="medecin_prescripteur">
                <option> </option>
                  @foreach($docteurs as $docteur)
                  <option class ="text text-primary"> {{$docteur->titre_docteur}} {{$docteur->prenom_docteur}}</option>
              
                @endforeach
                </select>
         
              </div>

              <div class="form-group col-lg-6">
             
             <label for="date_arrive">Date d'arrivé : {{$patient->date_arrive}}</label>
             <input type='text' class="form-control" name="date_arrive" >
             
        
             </div>

            
            </div>

            <div class="form-row">
            
                <div class="form-group col-md-3">
              
              <label for="lien_parente">Lien de Parenté: {{$patient->lien_parente}}</label>
              <select  class="form-control" name="lien_parente">
              <option></option>
              <option value = "a">Lui-meme</option>
              <option value = "b" >Conjointe</option>
              <option value = "c">Enfant</option>
              </select>
          

                </div>

                <div class="form-group col-md-5">
                
                
                </div>

              <div class="form-group col-md-3">
                <label for="submit"> Veuillez poursuivre la modification!</label>
                <button type="submit" id="submit" class="btn btn-primary col-sm-12 ">Poursuivre</button>
                </div>
            </div>

          </form>

          </div>

              
              
            
            </div>
</section>
@endsection