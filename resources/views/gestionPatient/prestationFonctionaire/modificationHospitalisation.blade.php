@extends('layouts.app')

@section('content')

<section class="wrapper">
<form method="post" action="{{route('PatientController.update')}}">
                @csrf
   <div class="row">
   <div class="col-md-4">
<p>
   <div class="btn-group">

                <a type="button" class="btn btn-theme02" href = "{{route('createPatient')}}"> Inscription</a>
                <a type="button" class="btn btn-default" href = "{{route('listPatient')}}">liste patients</a>
                
              </div>

   </p>
 
   </div>
   <div class="col-md-8">
   
   <h4 class="text text-primary"> Information agent fonctionaire & hospitalisation patient</h4>
       On est sur la modification du patient: <a class ="text text-danger"> {{$patient->nom_patient}}   {{$patient->prenom_patient}} </a></br>
    <a class = "text text-warning">Veuillez modifier les informations concernant l'agent fonctionaire</a>

   </div>
   
   </div>







   <div class="row mt ">
    
    
   
    

    <div class="col-lg-12">
    
       

            <div class="form-row">
            
                <div class="form-group col-md-4">
                
                    <label class="col-form-label" for= "nom_agent"> Nom agent : {{$patient->nom_agent}}</label>
                    <input type =text class= "form-control" id= "nom_agent" name ="nom_agent" value = " @if($patient->lien_parente == 'a') {{$patient->nom_patient }}@endif" > 
                
                </div>

                <div class="form-group col-md-4">
                
                    <label class="col-form-label" for = "prenom_agent"> Prenom agent : {{$patient->prenom_agent}}</label>
                    <input type =text class= "form-control" id= "prenom_agent" name ="prenom_agent" value = " @if($patient->lien_parente == 'a') {{$patient->prenom_patient }}@endif" >
                
                </div>

                <div class="form-group col-md-4">
          
                    <label class="col-form-label ">Sexe Agent : {{$patient->sexe_agent}}</label>
                    <div class="form-check " >
                        <input class="form-check-input" type="radio" name="sexe_agent" id="sexe_masculin" value="M"  {{ $check_sex_agent->masculin}} >
                        <label class="form-check-label" for="sexe_masculin">
                        Masculin
                        </label>
                    </div>

                    <div class="form-check  " >
                        <input class="form-check-input" type="radio" name="sexe_agent" id="sexe_feminin" value="F"  {{$check_sex_agent->feminin}}>
                        <label class="form-check-label" for="sexe_feminin">
                            Féminin
                        </label>
                    </div>
          
                </div>
            
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">

                    <label class ="col-form-label" for ="im_agent"> Imatriculation de l'agent : {{$patient->im_agent}}</label>
                    <input type= "text" class = "form-control" id = "im_agent" name ="im_agent">
                
                </div>
                <div class="form-group col-md-4">

                    <label class ="col-form-label" for ="adresse_agent"> Adresse de l'agent : {{$patient->adresse_agent}}</label>
                    <input type= "text" class = "form-control" id = "adresse_agent" name ="adresse_agent" 
                    value = " @if($patient->lien_parente == 'a') {{$patient->adresse }}@endif" >

                </div>

                <div class="form-group col-md-4">

                    <label class ="col-form-label" for ="service_employeur"> Service employeur : {{$patient->service_employeur}}</label>
                    <input type= "text" class = "form-control" id = "service_employeur" name ="service_employeur">

                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-3">

                    <label class ="col-form-label" for ="num_visa"> Numero visa : {{$patient->num_visa}}</label>
                    <input type= "text" class = "form-control" id = "num_visa" name ="num_visa">
                
                </div>
                <div class="form-group col-md-3">

                    <label class ="col-form-label" for ="signataire_visa"> Signataire visa : {{$patient->signataire_visa}}</label>
                    <input type= "text" class = "form-control" id = "signataire_visa" name ="signataire_visa">

                </div>

                <div class="form-group col-md-3">

                    <label class ="col-form-label" for ="fonction_signataire"> Fonction signataire : {{$patient->fonction_signataire}}</label>
                    <input type= "text" class = "form-control" id = "fonction_signataire" name ="fonction_signataire">

                </div>

                    <div class="form-group col-md-3">
                    <label class ="col-form-label" for ="date_visa"> Date visa : {{$patient->date_visa}}</label>
                    <input type= "date" class = "form-control" id = "date_visa" name ="date_visa">

                </div>


            </div>

            <div class="form-row">

                    <div class="form-group col-md-10">
                            <div class="text text-warning">

                                Cliquer le bouton pour modifier les informations concernant l'hospitalisation du patient
                            </div>
                            
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"><i class = "fa fa-cog"> </i> Modification agent</button>
                    </div>

                </div>

                <div class="form-group col-md-2">

                        <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>  Ok,modifier!</button>

                </div>
            </div>

            
           
        

    </div>

</div>


















<div class="row mt collapse" id = "collapse2">

        <div class="col-lg-12">

       
                <input type = "hidden" name="num_patient" value = "{{$patient->num_patient}}">
                <div class="form-row">

                        <div class="form-group col-md-4">

                            <label class="col-form-label ">Hospitalisation : {{$patient->hospitalisation}}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hospitalisation" id="oui" value="1" >
                                <label class="form-check-label" for="oui">
                                    Oui
                                </label>
                            </div>

                            <div class="form-check  ">
                                <input class="form-check-input" type="radio" name="hospitalisation" id="non" value="0">
                                <label class="form-check-label" for="non">
                                    Non
                                </label>
                            </div>

                        </div>
                        
                        <div class="form-group col-md-4">
                        <label for="unite_admission">Unite d'admission : {{$patient->unite_admission}}</label>
                        <select class="form-control" name="unite_admission">
                        @foreach($unite_admissions as $unite_admission)
                        <option> </option>
                        <option class ="text text-primary"> {{$unite_admission->nom_unite_admission}} </option>

                        @endforeach

                        </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="col-form-label text text-light" for="date_hospitalisation"> Date d'hospitalisation {{$patient->date_hospitalisation}}</label>
                            <input type="date" class="form-control" id="date_hospitalisation" name ="date_hospitalisation">

                        </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    
                    </div>
                    <div class="form-group col-md-6">
                    
                    </div>
                </div>

                 <div class="form-row">
                    <div class="form-group col-md-4">
                        
                    <label for="categorie_patient">Catégorie Patient : {{$patient->categorie_patient}}</label>
                        <select class="form-control" name="categorie_patient" id ="categorie_patient">
                        <option> </option>
                        <option class ="text text-primary" value = 2> 2eme </option>
                        <option class ="text text-primary" value = 1> 1ére </option>

                        

                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        
                        <label class="col-form-label text text-light" for="chambre_patient">Chambre du patient : {{$patient->chambre_patient}}</label>
                        <input type="text" class="form-control" id="chambre_patient" name ="chambre_patient">

                    </div>

                    <div class="form-group col-md-4">
                        
                        <label class="col-form-label text text-light" for="lit_patient">Lit du patient : {{$patient->lit_patient}}</label>
                        <input type="text" class="form-control" id="lit_patient" name ="lit_patient">

                    </div>

                </div>

                

                <div class="form-row">

                    <div class="form-group col-md-6">

                        <label for="etat_patient">Etat patient : {{$patient->etat_patient}}</label>
                        <select class="form-control" name="etat_patient" id ="etat_patient">
                        <option> </option>
                        <option class ="text text-primary" value = 1> Normale</option>
                        <option class ="text text-primary" value = 2> Mauvais</option>

                        

                        </select>

                    </div>

                    <div class="form-group col-md-6">

                        <label class="col-form-label text text-light" for="diagnostic_accueil"> Diagnostic à l'accueil : {{$patient->diagnostic_accueil}}</label>
                        <input type="text" class="form-control" id="diagnostic_accueil" name ="diagnostic_accueil">

                    </div>

                </div>
                
            

                
            

            

        </div>

    </div>



    <!-- info agent-->

    
    </form>
</section>
@endsection