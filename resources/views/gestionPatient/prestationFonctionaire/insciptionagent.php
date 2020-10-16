<div class="col-lg-12">
        
           

        <div class="form-row">
        
            <div class="form-group col-md-4">
            
                <label class="col-form-label" for= "nom_agent"> Nom agent</label>
                <input type =text class= "form-control" id= "nom_agent" name ="nom_agent" value = " @if($last_insert_patient->lien_parente == 'a') {{$last_insert_patient->nom_patient }}@endif" > 
            
            </div>

            <div class="form-group col-md-4">
            
                <label class="col-form-label" for = "prenom_agent"> Prenom agent</label>
                <input type =text class= "form-control" id= "prenom_agent" name ="prenom_agent" value = " @if($last_insert_patient->lien_parente == 'a') {{$last_insert_patient->prenom_patient }}@endif" >
            
            </div>

            <div class="form-group col-md-4">
      
                <label class="col-form-label ">Sexe Agent</label>
                <div class="form-check disabled" >
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

                <label class ="col-form-label" for ="im_agent"> Imatriculation de l'agent</label>
                <input type= "text" class = "form-control" id = "im_agent" name ="im_agent">
            
            </div>
            <div class="form-group col-md-4">

                <label class ="col-form-label" for ="adresse_agent"> Adresse de l'agent</label>
                <input type= "text" class = "form-control" id = "adresse_agent" name ="adresse_agent" 
                value = " @if($last_insert_patient->lien_parente == 'a') {{$last_insert_patient->adresse }}@endif" >

            </div>

            <div class="form-group col-md-4">

                <label class ="col-form-label" for ="service_employeur"> Service employeur</label>
                <input type= "text" class = "form-control" id = "service_employeur" name ="service_employeur">

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-3">

                <label class ="col-form-label" for ="num_visa"> Numero visa</label>
                <input type= "text" class = "form-control" id = "num_visa" name ="num_visa">
            
            </div>
            <div class="form-group col-md-3">

                <label class ="col-form-label" for ="signataire_visa"> Signataire visa</label>
                <input type= "text" class = "form-control" id = "signataire_visa" name ="signataire_visa">

            </div>

            <div class="form-group col-md-3">

                <label class ="col-form-label" for ="fonction_signataire"> Fonction signataire</label>
                <input type= "text" class = "form-control" id = "fonction_signataire" name ="fonction_signataire">

            </div>

                <div class="form-group col-md-3">
                <label class ="col-form-label" for ="date_visa"> Date visa</label>
                <input type= "date" class = "form-control" id = "date_visa" name ="date_visa">

            </div>


        </div>

        
       
    </form>

</div>