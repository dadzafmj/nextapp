


@extends('layouts.app')

@section('content')

<section class = "wrapper">
        <div class="col-lg-12">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h3 class="mb-0">{{ __('Liste de prestation rendue sur une intervale de temp donnée') }}</h3>
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

                    <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                              <tr>
                              
                                <td>Numero</td>
                                <td>Code prestation</td>
                                <td>Date prestaton</td>
                                <td>Tarif</td>
                                <td>Montant</td>
                                <td><a href="{{ url('montant_globale/show') }}" class="btn btn-primary">Edit</a></td>
                              </tr>
                          </thead>
                            <tbody>
                              @foreach($Mouv_prestation_rendue as $share)
                              <tr>
                                  <td>{{$share->num}}</td>
                                  <td>{{$share->code_prst}}</td>
                                  <td>{{$share->date_prst}}</td>
                                  <td>{{$share->tarif}}</td>
                                  <td>{{$share->montant}}</td>
                                  <td></td>
                                  
                              </tr>
                              @endforeach
                          </tbody>
                          </table>

                          </div>

                </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        
</section>  

@endsection























