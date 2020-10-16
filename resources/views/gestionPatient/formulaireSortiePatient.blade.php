
@extends('layouts.app')


@section('content')

<section class = "wrapper">

      
        <div class="row mt">
        @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div><br />
                @endif

       <div class="col-md-12">
                <div class="col-md-5">
                      <a type="button" class="btn btn-theme02" href = "{{route('createPatient')}}"> Inscription</a>
                      <a type="button" class="btn btn-default" href = "{{route('sortiePatient')}}">Sortie patient</a>
                    
                </div>
                   
                <div class="col-md-7">
                    
                <h3 class = "text  text-danger"> Sortie du patient </h3>
                    
                 </div>   

       </div>

       <div class="col-md-12">
          
          <hr>
          <P class = "text text-center"> On est sur le point d'enregistrer la sortie de : <span class = "text text-danger"> {{$patient->nom_patient}} {{$patient->prenom_patient}} </span> </P>
          <p class = "text text-center text-warning"> Veuillez entrer les information concernant la sortie du patient! </p>          
          
          
          </div>


        </div>
                    

          

               
         

      

        <div class="row mt">

        
                <div class="col-md-12">


                      <form method = "post" action= "{{route('SortiePatientController.store')}}">
                        @csrf

                            <div class="form-row col-md-12">


                                    <div class="form-group ">
                                            
                                            
                                           
                                            <input type = "hidden" class = "form-control" id = "num_patient" name = "num_patient" value = "{{$patient->num_patient}}"> 
                                            
                                                                                        
                                    </div>


                                   


                                    <div class="form-group col-md-4">
                                            
                                            
                                            <label for = "decision_sortie">Decision de sortie</label>
                                            <input type = "text" class = "form-control" id = "decision_sortie" name = "decision_sortie"> 
                                            
                                                                                        
                                    </div>


                                    <div class="form-group col-md-4">
                                            
                                            
                                            <label for = "diagnostic_sortie"> Diagnostique à la sortie</label>
                                            <textarea type = "text" class = "form-control" id = "diagnostic_sortie" name = "diagnostic_sortie"> 
                                            </textarea>
                                                                                        
                                    </div>

                                    
                            </div>

                             <div class="form-row col-md-12">


                                    <div class="form-group col-md-4">
                                            
                                            
                                            <label for = "date_sortie"> Date de sortie </label>
                                            <input type = "date" class = "form-control" id = "date_sortie" name = "date_sortie" required> 
                                            
                                                                                        
                                    </div>


                                    <div class="form-group col-md-6">
                                            
                                            
                                                                                        
                                    </div>
                                    
                                   
                        
                            </div>

                            <div class="form-row col-md-12">


                                    <div class="form-group col-md-4">
                                            
                                            
                                            
                                                                                        
                                    </div>


                                    <div class="form-group col-md-6">
                                            
                                            
                                    <button type = "submit" class = "  btn btn-primary" id = "submit" > ok,valider!</button>
                                                                                        
                                    </div>
                                    
                                   
                        
                            </div>

                           
                                            
                      </form>  
                
                </div>

        
        </div>


</section>
@endsection