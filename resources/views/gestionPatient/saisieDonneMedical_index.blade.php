@extends('layouts.app')

@section('content')


      <section class="wrapper">
      
      <div class="row mt">
              <div class="col-lg-12">
              
                
                    <div class="col-md-5">
                      <a type="button" class="btn btn-theme02" href = "{{route('createPatient')}}"> <i class = "fa fa-chevron-left" > </i> Inscription</a>
                      <a type="button" class="btn btn-default" href = "{{route('saisieDonneMedical')}}">Donne medical  <i class = "fa fa-refresh"> </i> </a>
                    
                    </div>
                   
                    <div class="col-md-7">
                    <span class="text text-warning " >  <h4> Gestion dossier medical </h4> </span>
                    
                    
                   </div>   
                    
             
              
              </div>
          </div>

     
      
<div class="col-lg-6 col-lg-offset-3 p404 centered">
        <br>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <form method="post" action="{{route('saisieDonneMedicalRecherche')}}">
          @csrf
          <label class = " text text-warning"for = "recherche" >Veuillez rechercher le patient pour creer ou modifier son dossier medical!</label>
            <input type="text" class="form-control" id="recherche" name="recherche">
            <button type = "submit" class="btn btn-theme mt">Search</button>
            </form>
          </div>
        </div>

</div>
@if(isset($success))
                 
                 <div class="alert alert-success alert-dismissable col-md-4 col-md-offset-7 ">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>            
                    {{$success}}              
                    </div>
                  
                    @endif

        <div class="row mt">

        

          <div class="col-md-12">
            <div class="content">
              <table class="table table-striped table-advance text text-center ">
              
                <hr>
                <thead class = "text text-center">
                  <tr class = "text text-center">
                    <th class = "text text-center"> Numeros </br> patient  </th>

<th class = "text text-center"> Numeros </br> dossier medical </th>





                    
                    <th class = "text text-center"> Nom et Prenoms </br> patient</th>
                    
                   
                   

                   
                    <th class = "text text-center" >Date Entree </br> patient </th> 
                    <th class = "text text-center"> Modification </br> dossier medical </th>
                    <th class = "text text-center"> Creation </br> Dossier medical</th>
                    <th> <th>
                  </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                <tr>
                              <td> <span class ="text text-danger">{{$patient->num_patient}} </span> </td>
                              <td> <span class ="text text-danger">{{$patient->num_dossier}} </span> </td>
                              <td> <span class ="text text-primary"> {{$patient->nom_patient   }} </span>   <span class = "text text-warning">{{$patient->prenom_patient}} </span>   </td>
                              
                              
                              
                            
                             
                              <td>{{$patient->date_arrive}}</td>
                              
                              <td> 
                              


                                      <form method = "post" action = "{{route('saisieDonneMedicalShow_update')}}">
                                        @csrf
                                        <input type = "hidden" name = "num_patient" value = "{{$patient->num_patient}}">
                                        <input type = "hidden" name = "num_dossier" value = "{{$patient->num_dossier}}">
                                        <button type = submit class="btn btn-theme03" @if($patient->num_dossier==0) disabled @endif> <i class ="fa fa-edit"> </i> modif </button> 
                                      
                                        </form>

                              
                              
                              </td>
                                      
                                      <td>
                                     
                                      <form method = "post" action = "{{route('saisieDonneMedicalShow')}}">
                                        @csrf
                                        <input type = "hidden" name = "num_patient" value = "{{$patient->num_patient}}">
                                      <button type = submit class="btn btn-theme02"  @if($patient->num_dossier!=0) disabled @endif > <i class ="fa fa-check"> </i> creer  </button> 
                                      
                                      </form>
                                      
                                      </td>

                              
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