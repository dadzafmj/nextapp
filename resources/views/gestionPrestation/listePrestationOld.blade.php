@extends('layouts.app', ['pageSlug' => 'listePrestation'])
@section('content')



 <!--	
ref_prestation
nom_prestation
prix_prestation
ref_service
ref_sous_service
nombreB
nombreKO
--> @include('layouts.headers.mycards')





<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Liste des prestations disponible ') }}</h3>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
<!-- table -->          <div class="table">
                          <table class="table-responsive">
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
<!-- end of table -->
                          </div>

                </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth') 
        </div>
            
         
</div>  









@endsection