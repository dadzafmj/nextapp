@extends('layouts.app')

@section('content')

<section class="wrapper">
    <h2 class > <i class="fa fa-angle-right"> </i> Information agent Fonctionaire </h2>
    <h4 class >     On est sur l'inscription de ......... </br>
    Veuillez entrer les informations concernant l'agent Fonctionaire </h2>

    <div class="row mt">

        <div class="col-lg-12">
        
            <form>

                <div class="form-row">
                
                    <div class="form-group col-md-4">
                    
                        <label class="col-form-label" for= "nom_agent"> Nom agent</label>
                        <input type =text class= "form-control" id= "nom_agent" name ="nom_agent">
                    
                    </div>

                    <div class="form-group col-md-4">
                    
                        <label class="col-form-label" for = "prenom_agent"> Prenom agent</label>
                        <input type =text class= "form-control" id= "prenom_agent" name ="prenom_agent">
                    
                    </div>

                    <div class="form-group col-md-4">
              
                        <label class="col-form-label ">Sexe Agent</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe_agent" id="sexe_masculin" value="M" >
                            <label class="form-check-label" for="sexe_masculin">
                            Masculin
                            </label>
                        </div>

                        <div class="form-check  ">
                            <input class="form-check-input" type="radio" name="sexe_agent" id="sexe_feminin" value="F">
                            <label class="form-check-label" for="sexe_feminin">
                                Féminin
                            </label>
                        </div>
              
                    </div>
                
                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">

                        <label class ="col-form-label" for ="im_agent"> Imatriculation de l'agent</label>
                        <input type= "text" class = "form-control" id = "im_agent" name ="im_agent">
                    
                    </div>
                    <div class="form-group col-md-4">

                        <label class ="col-form-label" for ="adress_agent"> Adress de l'agent</label>
                        <input type= "text" class = "form-control" id = "adress_agent" name ="adress_agent">

                    </div>

                    <div class="form-group col-md-4">

                        <label class ="col-form-label" for ="service_employeur"> Service employeur</label>
                        <input type= "text" class = "form-control" id = "service_employeur" name ="service_employeur">

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">

                        <label class ="col-form-label" for ="num_visa"> Numero visa</label>
                        <input type= "text" class = "form-control" id = "num_visa" name ="num_visa">
                    
                    </div>
                    <div class="form-group col-md-4">

                        <label class ="col-form-label" for ="signataire_visa"> Signataire visa</label>
                        <input type= "text" class = "form-control" id = "signataire_visa" name ="signataire_visa">

                    </div>

                    <div class="form-group col-md-4">

                        <label class ="col-form-label" for ="fonction_signataire"> Fonction signataire</label>
                        <input type= "text" class = "form-control" id = "fonction_signataire" name ="fonction_signataire">

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">

                        <label class ="col-form-label" for ="date_visa"> Date visa</label>
                        <input type= "text" class = "form-control" id = "date_visa" name ="date_visa">
                    
                    </div>
                    <div class="form-group col-md-4">
                   

                    </div>

                    <div class="form-group col-md-4">
                    <div> </br> </div>
                    <buttun type="submit" class="btn btn-primary">Submit</button>
                        
                    </div>

                </div>

                

            </form>

        </div>

    </div>
</section>
@endsection