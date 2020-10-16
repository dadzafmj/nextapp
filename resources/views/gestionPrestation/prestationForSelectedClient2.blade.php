@extends('layouts.app', ['title' => __('User Profile')])

@section('content')


    
;



<div class="container-fluid mt--7">





        <div class="row">
            <div class="col">
           
                        <div class="card shadow">
                        
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">{{ __('Liste des prestations choisies ') }}</h3>
                                    </div>
                                    
                                </div>
                            </div>
                            <p>
                            Num Patient:{{$patient->num_patient}} </br>
                            Nom du Patien: {{$patient->nom_patient}} </br>
                            Prénom du Patien: {{$patient->Prenom_patient}}
                            </p>

                            <!-- table -->  

                            <div class="table-responsive align-items-center" id = "frmPrestDelete">

                                                

                            <table class="table">
                                <thead >
                                    <th scope="col" class ="text text-success align-items-center" > Id </br> prestation</th>
                                    <th scope="col" class ="text text-success align-items-center">Nom </br> prestation</th>
                                    <th scope="col" class ="text text-success align-items-center">Nombre </br>Prestation </th>
                                    <th scope="col" class ="text text-success align-items-center">Montant</th>
                                    <th scope="col" class ="text text-success align-items-center"> Action</th>
                                    
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
                                        
                                        
                                                                <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-v icon icon-shape bg-gradient-primary text-white rounded-circle shadow "></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                             
                                                                       
                                                           
                                                                        <!--<a class="dropdown-item" href ="{{route('prestationForSelectedClient',$patient->num_patient)}}"> <img src ="{{asset('images')}}/prestation_modif.png"--></a> 
                                                                      <!--  <a class="dropdown-item" href =""> <img src ="{{asset('images')}}/facture_non_paye.png"  > {{__('Facturer prestation')}} </a>   --> 
                                                                        <!--<a class="dropdown-item" href =""> <img src ="{{asset('images')}}/agent_modif.png"  > {{__('Modifier Patient')}} </a> -->
                                                                          
                                                                        <a type="button button-danger" class="dropdown-item" href="{{route('deletePrestPatient',[$lastPrestation->idprest,$patient->num_patient])}}" >
                                                                                        {{ __('Suprimer') }}
                                                                                    </a>
                                                                                  
                                                                            
                                                                                
                                                                            
                                                                        </div>
                                                                    </div>
                                        
                                        
                                        
                                        
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
                                                                <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-v icon icon-shape bg-gradient-danger text-white rounded-circle shadow "></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                             
                                                                       
                                                           
                                                                        <!-- <a class="dropdown-item" href ="{{route('prestationForSelectedClient',$patient->num_patient)}}"> <img src ="{{asset('images')}}/prestation_modif.png"  > {{__('Demander prestation')}} </a> --> 
                                                                       <a class="dropdown-item" href ="{{route('factureStore',$patient->num_patient)}}"> <img src ="{{asset('images')}}/facture_non_paye.png"  > {{__('Facturer prestation')}} </a>  
                                                                        <!-- <a class="dropdown-item" href =""> <img src ="{{asset('images')}}/agent_modif.png"  > {{__('Modifier Patient')}} </a>  --> 
                                                                          
                                                                                    
                                                                                  
                                                                            
                                                                                
                                                                            
                                                                        </div>
                                                                    </div>  
                                        </td>
                                    </tr>


                                </tbody>

                            </table>

                            </div>
                            <!-- end of table -->



                
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">{{ __('Liste des prestations disponible ') }}</h3>
                                    </div>
                                    
                                </div>
                            </div>
                                                
                            <!-- table -->  

                            <div class="table-responsive align-items-center">

                    

                                    <table class="table">
                                        <thead >
                                            <th scope="col" class ="text text-success align-items-center" > Réf </br> prestation</th>
                                            <th scope="col" class ="text text-success align-items-center">Nom </br> prestation</th>
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
                                                
                                                <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-v icon icon-shape bg-gradient-primary text-white rounded-circle shadow "></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                             
                                                                       
                                                           
                                                                       
                                                                        <form method="get" action="{{ route('demandePrestationStore',[$patient->num_patient , $prestation->ref_prestation, $prestation->nom_prestation, $prestation->prix_prestation]) }}">
                                                                           
                                                                      <!--      <div class="form-group">
                                                                                @csrf
                                                                                <label for="ref_prest">ref_prest:</label>
                                                                                <input type="text" class="form-control" name="ref_prest"/>
                                                                            </div>
                                                                            -->
                                                                    <!--
                                                                            <div class="form-group">
                                                                                <label for="idprest">idprest :</label>
                                                                                <input type="text" class="form-control" name="idprest"/>
                                                                            </div>
                                                                    -->
                                                                       <!--     <div class="form-group">
                                                                                <label for="nom_prest">nom_prest :</label>
                                                                                <input type="text" class="form-control" name="nom_prest"/>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="num_patient">num_patient :</label>
                                                                                <input type="text" class="form-control" name="num_patient"/>
                                                                            </div>
                                                                    -->     
                                                                            <div class="form-group">
                                                                                <label for="nombre_prest">nombre_prest :</label>
                                                                                <input type="text" class="form-control" name="nombre_prest"/>
                                                                            </div>
                                                                    <!--
                                                                            <div class="form-group">
                                                                                <label for="prix_prest">prix_prest:</label>
                                                                                <input type="text" class="form-control" name="prix_prest"/>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="date_prest">date_prest:</label>
                                                                                <input type="date" class="form-control" name="date_prest"/>
                                                                            </div>
                                                                    -->
                                                                            <button type="submit" class="btn btn-primary">Demander</button>
                                                                        </form>
                                                                                  
                                                                            
                                                                                
                                                                            
                                                                        </div>
                                                                    </div>
                                                
                                                
                                                
                                                
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>

                            </div>
                          <!-- end of table -->

                        </div>

                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                
                            </nav>
                        </div>
                </div>
            </div>
           
        </div>
            
         
</div>  


@endsection