@extends('layouts.app', ['pageSlug' => 'prestation_fonctionaire'])

@section('content')


      <section class="wrapper">
      
      <div class="row mt">
              <div class="col-lg-12">
              
              
              

                   
                   
                    <div class="col-md-5">
                      <a type="button" class="btn btn-theme02" href = "{{route('createPatient')}}"> Inscription</a>
                      <a type="button" class="btn btn-default" href = "{{route('listPatient')}}">liste patients</a>
                    
                    </div>
                   
                    <div class="col-md-7">
                    <span class="text text-warning " >  <h4> Gestion patient </h4> </span>
                    
                    
                   </div>   
                    
             
            
              
              
              
              
              </div>
          </div>

     
      
<div class="col-lg-6 col-lg-offset-3 p404 centered">
        <br>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <form method="get" action="{{route('PatientController.recherche')}}">
          <label class = " text text-warning"for = "recherche" >Veuillez rechercher le patient!</label>
            <input type="text" class="form-control" id="recherche" name="recherche">
            <button type = "submit" class="btn btn-theme mt">Search</button>
            </form>
          </div>
        </div>

</div>


        <div class="row mt">

        

          <div class="col-md-12">
            <div class="content">
              <table class="table table-striped table-advance ">
                
                <hr>
                <thead>
                  <tr>
                    <th> Num Patient  </th>






                    
                    <th> Nom et Prenoms</th>
                    
                   <th scope="col" class ="text text-dark">Adresse & tel</th>
                   

                   
                    <th>Date Entree </th> 
                   
                    <th> Prestation </th>
                    <th> <th>
                  </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                <tr>
                              <td> <span class ="text text-danger">{{$patient->num_patient}} </span> </td>
                              <td> <span class ="text text-primary"> {{$patient->nom_patient   }} </span>   <span class = "text text-warning">{{$patient->prenom_patient}} </span> <inline>  <form method = "post" action = "{{route('modifierPatient')}}">  @csrf <input type = "hidden" name = "num_patient" value = "{{$patient->num_patient}}" > <button type = "submit" class="badge bg-warning"> modif </button>  </form> </inline>  </td>
                              
                              
                              
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
                                      <form method = "get" action = "{{route('prestationForSelectedClient',$patient->num_patient)}}">

                                      <button type = submit class="badge bg-important"> demander  </button> 
                                      
                                      </form>

                              
</td>

<td> </td>
                            </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
   

@endsection