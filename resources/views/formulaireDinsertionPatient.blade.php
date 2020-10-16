
@extends('layouts.app')

@section('content')

      <section class="wrapper">
<div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"> Veuillez remplir le formulaire pour inserer un nouveau patient!</h4>
              <form method="post" action="{{ route('PatientController.store') }}">
         
         
      <div class="form-group">
              @csrf
              <label for="num_patient">Nom:</label>
              <input type="text" class="form-control" name="nom_patient"/>
          </div>
         
         
         
         
          <div class="form-group">
              @csrf
              <label for="nom_patient">Nom:</label>
              <input type="text" class="form-control" name="nom_patient"/>
          </div>
          <div class="form-group">
              <label for="prenom_patient">Prénoms:</label>
              <input type="text" class="form-control" name="prenom_patient"/>
          </div>

          
          <label>Sexe:</label>
          <div class="form-group mx-sm-3 mb-2 ">
          
              <input class="form-check-input" type="radio" name="sexe" id="masculin" value="M" >
              <label class="form-check-label" for="masculin">
              Masculin
              </label>
          </div>
        <div class="form-group mx-sm-3 mb-2">
            <input class="form-check-input" type="radio" name="sexe" id="feminin" value="F">
            <label class="form-check-label" for="feminin">
              Féminin
            </label>
          </div>




          <div class="form-group">
              <label for="age">age:</label>
              <input type="text" class="form-control" name="age"/>
          </div>
          <div class="form-group">
              <label for="adresse">adresse:</label>
              <input type="text" class="form-control" name="adresse"/>
          </div>
          
          <div class="form-group">
              <label for="num_dossier">Numeros dossier:</label>
              <input type="text" class="form-control" name="num_dossier"/>
          </div>
          
          
          <div class="form-group">
              <label for="tel">Télephone:</label>
              <input type="text" class="form-control" name="tel"/>
          </div>

          



          <div class="form-group">
              <label for="medecin_prescripteur">medecin_prescripteur:</label>
              <select  class="form-control" name="medecin_prescripteur">
              @foreach($docteurs as $docteur)
            <option class ="text text-primary"> {{$docteur->titre_docteur}} {{$docteur->prenom_docteur}}</option>
              
              @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="date_arrive">Date d'arrivé:</label>
              <input type='date' class="form-control" name="date_arrive"/>
          </div>

          <div class="form-group">
              <label for="date_remise">Date remise :</label>
              <input type="date" class="form-control" name="date_remise"/>
          </div>

          <div class="form-group">
              <label for="lien_parente">Lien de Parenté:</label>
              <select  class="form-control" name="lien_parente">
              <option value = "a">Lui-meme</option>
              <option value = "b">Conjointe</option>
              <option value = "c">Enfant</option>
              </select>
          </div>

          <div class="form-group">
              <label for="unite_age">unite age</label>
              <input type="text" class="form-control" name="unite_age"/>
          </div>

          <div class="form-group">
              <label for="date_complet">date complet</label>
              <input type="date" class="form-control" name="date_complet"/>
          </div>


<!--renseignement agent-->


        <div class="form-group">
              <label for="nom_agent">Nom agent </label>
              <input type="text" class="form-control" name="nom_agent"/>
        </div>

        <div class="form-group">
              <label for="prenom_agent">Prenom agent </label>
              <input type="text" class="form-control" name="prenom_agent"/>
        </div>


        <div class="form-group">
              <label for="sexe_agent">sexe agent  </label>
              <input type="text" class="form-control" name="sexe_agent"/>
        </div>

        <div class="form-group">
              <label for="im_agent">Im_agent  </label>
              <input type="text" class="form-control" name="im_agent"/>
        </div>

        <div class="form-group">
              <label for="adresse_agent">adress agent  </label>
              <input type="text" class="form-control" name="adresse_agent"/>
        </div>

        <div class="form-group">
              <label for="service_employeur">Service employeur </label>
              <input type="text" class="form-control" name="service_employeur"/>
        </div>

        <div class="form-group">
              <label for="num_visa">Num visa </label>
              <input type="text" class="form-control" name="num_visa"/>
        </div>

        <div class="form-group">
              <label for="date_visa">Date visa </label>
              <input type="date" class="form-control" name="date_visa"/>
        </div>


        <div class="form-group">
              <label for="signataire_visa">Signataire visa </label>
              <input type="text" class="form-control" name="signataire_visa"/>
        </div>

        <div class="form-group">
              <label for="fonction_signataire">Signataire visa </label>
              <input type="text" class="form-control" name="fonction_signataire"/>
        </div>



        <div class="form-group">
              <label for="nomfichier">Nom fichier </label>
              <input type="text" class="form-control" name="nomfichier"/>
        </div>

          <label> Hospitalisation </label>
          
          
          <div class="form-group mx-sm-3 mb-2 ">
          
              <input class="form-check-input" type="radio" name="hospitalisation" id="oui" value="1" >
              <label class="form-check-label" for="oui">
              Oui
              </label>
          </div>
        <div class="form-group mx-sm-3 mb-2">
            <input class="form-check-input" type="radio" name="hospitalisation" id="non" value="0">
            <label class="form-check-label" for="non">
              Non
            </label>
          </div>


          <div class="form-group">
              <label for="unite_admission">Unite d'admission</label>
              <select class="form-control" name="unite_admission">
            @foreach($unite_admissions as $unite_admission)
            <option class ="text text-primary"> {{$unite_admission->nom_unite_admission}} </option>
            
            @endforeach
            
             </select>
          </div>

          <div class="form-group">
              <label for="etat_patient">Etat du patient</label>
              <input type="text" class="form-control" name="etat_patient"/>
          </div>

          <div class="form-group">
              <label for="diagnostic_accueil">diagnostic accueil</label>
              <input type="text" class="form-control" name="diagnostic_accueil"/>
          </div>

            <div class="form-group">
              <label for="diagnostic_sortie">diagnostic sortie</label>
              <input type="text" class="form-control" name="diagnostic_sortie"/>
             </div>
          

             <div class="form-group">
              <label for="chambre_patient">chambre patient</label>
              <input type="text" class="form-control" name="chambre_patient"/>
             </div>



             <div class="form-group">
              <label for="lit_patient">lit patient</label>
              <input type="text" class="form-control" name="lit_patient"/>
            </div>


            <div class="form-group">
              <label for="categorie_patient">categorie_patient</label>
              <input type="text" class="form-control" name="categorie_patient"/>
            </div>

            <div class="form-group">
              <label for="date_hospitalisation">date hospitalisation</label>
              <input type="date" class="form-control" name="date_hospitalisation"/>
            </div>

            <div class="form-group">
              <label for="decision_sortie">Decision de sortie </label>
              <input type="text" class="form-control" name="decision_sortie"/>
            </div>

            <div class="form-group">
              <label for="date_sortie"> Date de sortie </label>
              <input type="date" class="form-control" name="date_sortie"/>
            </div>

          <button type="submit" class="btn btn-primary">Valider</button>
      </form>
          </div>
</div>
</section>

          @endsection