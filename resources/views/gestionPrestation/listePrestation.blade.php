
@extends('layouts.app')

@section('content')
<section class="wrapper">
        <h3> {{ __('Liste des prestations disponible ') }}</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
            
              <hr>
              <div class="table">
                          <table class="table">
                            <thead >
                              <th scope="col" class ="text text-success align-items-center" > Réf </br> prestation</th>
                              <th scope="col" class ="text text-success align-items-center">Nom </br> prestation</th>
                              <th scope="col" class ="text text-success align-items-center">Prix </br> Prestation</th>
                              <th scope="col" class ="text text-success align-items-center">ref </br>service</th>
                              <th scope="col" class ="text text-success align-items-center">ref </br>sous_service</th>
                             <!-- <th scope="col" class ="text text-success align-items-center"> nombre </br> B</th>
                              <th scope="col" class ="text text-success align-items-center"> nombre </br>KO <th> -->
                            </thead>
                            <tbody>
                              @foreach($prestations as $prestation)
                              <tr>
                                <td> <p class ="text text-danger">{{$prestation->ref_prestation }} </p></td>
                                <td> <p class ="text text-primary"> {{$prestation->nom_prestation }} </p> </td>
                                <td>{{$prestation->prix_prestation }}</td>
                                <td>{{$prestation->ref_service }}</td>
                                <td>{{$prestation->ref_sous_service }}</td>
                              <!--  <td>{{$prestation->nombreB }}</td>
                                <td>{{$prestation->nombreKO }}</td>-->
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
            </div>
          </div>
          
        </div>
        
      </section>
      @endsection