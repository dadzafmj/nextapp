@extends('layouts.app')

@section('content')

<section class="wrapper">
        <div class="col-lg-12">

       


<div class="card-body">
                        <form method="post" action="{{ route('sortie_venteShow') }}" autocomplete="off">
                            @csrf          
                            @method('post')

                            <h6 class="heading-small text-muted mb-4 text-Primary">{{ __(' Veuillez entrer le numeros du dossier patient') }}</h6>
                            <div class="pl-lg-4">


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('doss_patient') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="dossier_patient">{{ __('doss_patient') }}</label>
                                    <input type="text" name="doss_patient" id="doss_patient" class="form-control form-control-alternative{{ $errors->has('doss_patient') ? ' is-invalid' : '' }}" placeholder="{{ __('doss_patient') }}" value="" required autofocus>
                                    @include('alerts.feedback', ['field' => 'doss_patient'])
                                </div>
                            </div>

                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
 </div>
 <h3 class ="text-primary"> Résultat sur le dossier patient numeros : {{$doss_patient?? ''}}  </h3> 


 <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-danger">
                  <th>
                   <a class = "text-success"> N </a>
                  </th>
                  <th>
                  <a class = "text-success"> Date  </a>
                  </th>
                  <th>
                 <a class = "text-success"> Nom medicament  </a>
                  </th>
                  <th>
                  <a class = "text-success"> Nombre medicament  </a>
                  <th>
                   <a class = "text-success"> Valeur  </a>
                  </th>
                  <th>
                 <a class = "text-success">  Remise   </a>
                  </th>
                  <th>
              <a class = "text-success">   Montant   </a>
                  </th>
                </thead>
                <tbody>
                 @if($doss_patient)
                 @foreach($data as $donne)
                  <tr>
                    <td>
                      {{$donne->num}}
                    </td>
                    <td>
                      {{$donne->date_saisie}}
                    <td>
                      {{$donne->id_stock}}
                    </td>
                    <td>
                     {{$donne->qte_dde}}
                    </td>
                    <td>
                     {{$donne->pu_stock}}
                    </td>
                    <td>
                     {{$donne->remise}}
                    </td>
                    <td>
                     {{$donne->montant}}
                    </td>
                  </tr>
                  @endforeach
                 @endif
                  
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </div>
  
</div>


</div>
    </section>










@endsection