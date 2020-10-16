@extends('layouts.app')

@section('content')
    

      <section class="wrapper">




      
        <h4 class = "text text-center"> Liste des prestations choisies </h4>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
                <h5 class = "text text-center">
                            Num Patient:<span class = "text text-danger">{{$patient->num_patient}} </span> /Nom & Prénom : <span class = "text text-danger"> {{$patient->nom_patient}} {{$patient->prenom_patient}} </span>
                            
                            
                            </h5>            
              
              <table class="table">
                <thead>
                  <tr>
                  <thead >
                                    <th scope="col" class ="text text-success align-items-center" > Id </br> prestation</th>
                                    <th scope="col" class ="text text-success align-items-center">Nom </br> prestation</th>
                                    <th scope="col" class ="text text-success align-items-center">Nombre </br>Prestation </th>
                                    <th scope="col" class ="text text-success align-items-center">Montant</th>
                                    <th scope="col" class ="text text-success align-items-center"> Action</th>
                                    
                    </thead>
                  </tr>
                </thead>
                <tbody>
                               <!-- 
                                   ref_prest'     => $ref_prestation,
                                    'idprest'       => NULL,
                                    'nom_prest'     => $nom_prestation,
                                    'num_patient'   => $num_patient,
                                    'nombre_prest'  => $request->get('nombre_prest'),
                                    'prix_prest'    => $prix_prestation*$request->get('nombre_prest'),
                                    'date_prest'  -->
                                    @isset($lastPrestations)
                                    @foreach($lastPrestations as $lastPrestation)
                                    <tr>
                                   
                                        <td> <p class ="text text-danger"> {{$lastPrestation->idprest}} </p></td>
                                        <td> <p class ="text text-primary"> {{$lastPrestation->nom_prest}}</p> </td>
                                        <td>                                 {{$lastPrestation->nombre_prest}} </td>
                                        <td>                                 {{$lastPrestation->prix_prest}}  </td>
                                        <td>          
                                        
                                        <a class="badge bg-important" href="{{route('deletePrestPatient',[$lastPrestation->idprest,$patient->num_patient])}}" >suprimer</a>               
                                  
                                        </td>
                                      
                                    </tr>
                                    @endforeach
                                    @endisset
                                    
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text text-primary">Total = </td>
                                        <td>{{$montantTotal??'0'}} Ar</td>
                                        <td> 
                                        <a class="dropdown-item" href ="{{route('factureStore',$patient->num_patient)}}"> <img src ="{{asset('images')}}/facture_non_paye.png"  > {{__('Facturer')}} </a>       
                                        </td>
                                    </tr>


                                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        
     
   
      
       
        <div class="row">
        <h4 class = "text text-center">Liste des prestations disponible </h4>
        <div class="col-md-12">
        <div class="row">
        
        <div class="col-md-4">
        
        </div>
        <div class="col-md-8">
        <div class="row">
        
        <form class="form-inline" methode = "get" action = "{{route('prestationForSelectedClient',$patient->num_patient)}}">

  <div class="form-group ">
    
    <input type="text" class="form-control" placeholder="Rechercher" name = "recherche">
  </div>
  <button type="submit" class="btn btn-theme"><i class="fa fa-search"></i> Recherche</button>
</form>
        </div>
        </div>
        <div class="col-md-2">
        
        </div>
        
        
        </div>
      
        </div>
          <div class="col-md-12">

            <div class="content-panel">
              
              
              <table class="table">
                <thead>
                <thead >
                                            <th scope="col" class ="text text-success align-items-center" > Réf </br> prestation</th>
                                            <th scope="col" class ="text text-success align-items-center">Nom </br> prestation </th>
                                            <th scope="col" class ="text text-success align-items-center">Prix </br> Prestation</th>
                                            <th scope="col" class ="text text-success align-items-center">Action</th>
                                            
                                        </thead>
                
                                        <tbody>
                                        @foreach($prestations as $prestation)
                                            <tr>
                                                <td> <p class ="text text-danger">{{$prestation->ref_prestation }} </p></td>
                                                <td> <p class ="text text-primary"> {{$prestation->nom_prestation }} </p> </td>
                                                <td>{{$prestation->prix_prestation }}</td>
                                                <td>              
                                                <form method="post" action="{{route('demandePrestationStore')}}">
                                              @csrf
                                                <div class="form-group">  
                                                      <input type="hidden" class="form-control" name="ref_prest" value = "{{$prestation->ref_prestation}}">
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                      
                                                      <input type="hidden" class="form-control" name="nom_prest" value = "{{$prestation->nom_prestation}}">
                                                  </div>

                                                  <div class="form-group">
                                                      
                                                      <input type="hidden" class="form-control" name="num_patient" value = "{{$patient->num_patient}}">
                                                  </div>
                                              
                                                  <div class="form-group">
                                                      
                                                      <input type="hidden" class="form-control" name="nombre_prest" value = "1">
                                                  </div>
                                          
                                                  <div class="form-group">
                                                      
                                                      <input type="hidden" class="form-control" name="prix_prest" value = "{{$prestation->prix_prestation}}">
                                                  </div>

                                                  
                                                  <button type="submit" class="btn btn-theme02"> <i class="fa fa-check"></i> Ajouter! </button>
                                              </form>
                      
                                                
                                                
                                                
                                                  </td>

                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
              </table>
            </div>
          </div>
          
        </div>
        
      </section>


@endsection