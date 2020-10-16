
@extends('layouts.app')

@section('content')


      <section class="wrapper">
      
      <div class="row mt">
              <div class="col-lg-12">

                

              @if(isset($success))
                 
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>            
                 {{$success}}              
                 </div>
               
                 @endif
                    <div class="col-md-5">
                      <a type="button" class="btn btn-theme02" href = "{{route('createPatient')}}"> Inscription</a>
                      <a type="button" class="btn btn-default" href = "{{route('sortiePatient')}}">Sortie patient</a>
                    
                    </div>
                    
                   
                    <div class="col-md-7">
                    <span class="text text-warning " >  <h4> Sortie  patient </h4> </span>
                    
                    
                   </div>   
                    
             
            
              
              
              
              
              </div>
          </div>

     
      
<div class="col-lg-6 col-lg-offset-3 p404 centered">
        <br>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <form method="get" action="{{route('SortiePatientController.recherche')}}">
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
              <div class="table-responsive-sm">
              <table class=" table">
                
                <hr>
                <thead>
                  <tr>
                    <th> Num Patient  </th>






                    
                    <th> Nom et Prenoms</th>

                    <th>Date Entree </th> 
                    <th>Decision de sortie </th> 
                    <th>Diagnostique </br> sortie </th> 
                    <th>Date Sortie </th> 
                    
                   <th scope="col" class ="text text-dark">Action</th>
                   

                   
                    
                   
                    <th> Demande sortie </th>
                    <th> <th>
                  </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                <tr>
                              <td> <span class ="text text-danger">{{$patient->num_patient}} </span> </td>
                              <td> <span class ="text text-primary"> {{$patient->nom_patient   }} </span> </br> <span class = "text text-warning">{{$patient->prenom_patient}} </span>   </td>
                              
                              <td>{{$patient->date_arrive}}</td>
                              <td>{{$patient->decision_sortie}}</td>
                              <td>{{$patient->diagnostic_sortie}}</td>


                              <td>{{$patient->date_sortie}}</td>
                              
                              <td>   @if(isset($patient->date_sortie)) <inline>  <form method = "post" action = "{{route('SortiePatientController.show')}}">  @csrf <input type = "hidden" name = "num_patient" value = "{{$patient->num_patient}}" > <button type = "submit" class="badge bg-warning"> modif </button>  </form> </inline>@endif  </td>
                             
                              
                            
                                      
                                      <td>
                                      @if(!isset($patient->date_sortie)) <form method = "post" action = "{{route('SortiePatientController.show')}}">
                                      @csrf 
                                      <input type = "hidden" name = "num_patient" value = "{{$patient->num_patient}}" >

                                      <button type = submit class="badge bg-important"> demander  </button> 
                                      
                                      </form> @endif

                              
</td>

<td> </td>
                            </tr>
                  @endforeach
                </tbody>
              </table>
              
              </div>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
   

@endsection