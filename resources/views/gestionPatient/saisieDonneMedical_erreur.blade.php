@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3 p404 centered">
        <img src="{{asset('img')}}/404.png" alt="">
        <h1>PANIQUE PAS!!</h1>
        <h4>le dossier medical que vous voulez modifié, est introuvable.</h3>
        <h5 class ="text text-danger"> veuillez créer un nouveau ou contacter l'administrateur!</h5>
        <span> Vouloir créer à nouveau?   cliquer le boutton!</span>
        <br>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
         <form method = "post" action = "{{route('saisieDonneMedicalShow')}}">
         @csrf
            <input type="hidden" class="form-control" name="num_patient" id = "num_patient" value ="{{$num_patient}}">
            <button class="btn btn-theme mt " id = ""> <i class = "fa fa-check"> </i>créer</button>
          </form>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>







@endsection