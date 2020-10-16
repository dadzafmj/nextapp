@extends('layouts.app')

@section('content')

<section class="wrapper">
@if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div><br />
 @endif
          <div class="row mt">
              <div class="col-lg-12">
              
              
              

                   
                   
                    <div class="col-md-4">
                      <a type="button" class="btn btn-theme02" href = "{{route('createPatient')}}"> Inscription</a>
                      <a type="button" class="btn btn-default" href = "{{route('listPatient')}}">liste patients</a>
                    
                    </div>
                   
                    <div class="col-md-8">
                    <span class="text text-warning " >  <h4> Veuillez entrer les informations du patient </h4> </span>
                    
                    
                   </div>   
                    
             
            
              
              
              
              
              </div>
          </div>
  
           

            <div class="row mt">
              
              
            <div class="col-lg-12">
            <form method="post" action="{{ route('PatientController.store') }}">
            @csrf
            <div class="form-row">

              <div class="form-group col-md-6">

                <label class="col-form-label text text-light" for="nom_patient">Nom du patient</label>
                <input type="text" class="form-control" id="nom_patient" name ="nom_patient">

              </div>

              <div class="form-group col-md-6">

                <label class="col-form-label "for="prenom_patient">Prénom du patient</label>
                <input type="text" class="form-control" id="prenom_patient" name = "prenom_patient">

              </div>

              


            </div>

            <div class="form-row">
            
              <div class="form-group col-md-2">
              
                <label class="col-form-label ">Sexe du patient</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexe" id="sexe_masculin" value="M" >
                  <label class="form-check-label" for="sexe_masculin">
                    Masculin
                  </label>
                </div>
                <div class="form-check  ">
                  <input class="form-check-input" type="radio" name="sexe" id="sexe_feminin" value="F">
                  <label class="form-check-label" for="sexe_feminin">
                    Féminin
                </label>
                </div>
              
              </div>

              <div class="form-group col-md-2">
              
                <label class="col-form-label text text-light" for="age">Age du patient</label>
                <input type="text" class="form-control" id="age" name ="age">
              
              </div>

              <div class="form-group col-md-2">
              
                <label  for="unite_age"> Unite age</label>
                <select class="form-control" id="unite_age" name = "unite_age">
                
                  <option value ="ans"selected>ans</option>
                  <option value="mois">mois</option>
                  <option value="jour">jour</option>

                </select>
              </div>


              <div class="form-group col-md-3">

                <label class="col-form-label text text-light" for="adresse">Adresse du patient</label>
                <input type="text" class="form-control" id="adresse" name ="adresse">

              </div>

              <div class="form-group col-md-3">

                <label class="col-form-label text text-light" for="tel">Numero telephone du patient</label>
                <input type="text" class="form-control" id="tel" name ="tel">

              </div>



            </div>
            
            <div class="form-row col-md-12">


            </div>

            <div class="form-row">


            


              <div class="form-group col-lg-6">
             
              <label for="medecin_prescripteur">medecin_prescripteur:</label>
                <select  class="form-control" name="medecin_prescripteur">
                  @foreach($docteurs as $docteur)
                  <option class ="text text-primary"> {{$docteur->titre_docteur}} {{$docteur->prenom_docteur}}</option>
              
                @endforeach
                </select>
         
              </div>

              <div class="form-group col-lg-6">
             
             <label for="date_arrive">Date d'arrivé:</label>
             <input type='date' class="form-control" name="date_arrive"/>
        
             </div>

            
            </div>

            <div class="form-row">
            
                <div class="form-group col-md-3">
              
              <label for="lien_parente">Lien de Parenté:</label>
              <select  class="form-control" name="lien_parente">
              <option value = "a">Lui-meme</option>
              <option value = "b">Conjointe</option>
              <option value = "c">Enfant</option>
              </select>
          

                </div>

                <div class="form-group col-md-6">
                
                
                </div>

              <div class="form-group col-md-2">
                <label for="submit"></label>
                <button type="submit" id="submit" class="btn btn-primary form-control">Ok, valider!</button>
                </div>
            </div>

          </form>

          </div>

              
              
            
            </div>
</section>
@endsection