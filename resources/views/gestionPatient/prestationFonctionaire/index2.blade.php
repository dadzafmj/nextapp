

      <div class="row">
      <table class="table align-items-center table-flush table-responsive">
                          <thead class="thead-light">
                            <th scope="col" class ="text text-dark">Num </br> Patient</th>
                            <th scope="col"   class ="text text-dark">Nom et Prenoms</th>
                            <th scope="col" class ="text text-dark">Adresse et </br> contact</th>
                            
                            <th scope="col"  class ="text text-dark"> Date Entree </th>
                            <th> <a class="m-2 font-weight-bold text-danger"> {{ __('Action') }} </a> </th>
                            
                           <!-- <th class ="text text-success">Prest</th>
                            <th class ="text text-success">Dos-MED </th>
                            <th class ="text text-success">Facture </th>
                            <th class ="text text-success"> Supr</th> -->
                          </thead>
                          <tbody>
                           @foreach($patients as $patient)
                            <tr>
                              <td> <a class ="text text-danger">{{$patient->num_patient}} </a> </td>
                              <td> <a class ="text text-primary"> {{$patient->nom_patient}} </a>  </br> <a class = "text text-warning">{{$patient->prenom_patient}} </a> </td>
                              <td>{{$patient->adresse}}  </br> {{$patient->tel}}</td>
                             
                              <td>{{$patient->date_arrive}}</td>
                              <!-- <td> <a href ="{{route('prestationForSelectedClient',$patient->num_patient)}}"> <img src ="{{asset('images')}}/agent_modif.png"  > </a> </td> -->
                              <!--<td><img src ="{{asset('images')}}/prestation_modif.png" ></td>
                              <td> <img src ="{{asset('images')}}/dm_modif2.png" > </td>
                              <td> <img src ="{{asset('images')}}/facture_non_paye.png" classe ="images small">  </td>
                              <td class="text small">  <button class = "btn btn-sm btn-danger ">
                                        <i class="tim-icons icon-simple-remove"></i>
                                        
                                      </button>  </td> -->
                                      <td> 
                                      <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-v icon icon-shape bg-gradient-primary text-white rounded-circle shadow "></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                             
                                                                       
                                                           
                                                                        <a class="dropdown-item" href ="{{route('prestationForSelectedClient',$patient->num_patient)}}" img src ="{{asset('images')}}/prestation_modif.png"  > {{__('Demander prestation')}} </a> 
                                                                    
                                                                        <a class="dropdown-item" href ="#" img src ="{{asset('images')}}/agent_modif.png"  > {{__('Modifier Patient')}} </a> 
                                                                          
                                                                                                                                                                    
                                                                            
                                                                                
                                                                            
                                                                        </div>
                                                                    </div>
                                      </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
      </div>
                    <div class="col-md-12">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $patients->links() }}
                        </nav>
                    </div>
              