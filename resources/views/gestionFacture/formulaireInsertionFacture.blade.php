@extends('layouts.app', ['pageSlug' => 'formulaireInsertionFacture'])

@section('content')
@include('layouts.headers.mycards')
<div class="card uper">
 <div class="card-header">
Veuillez saisir les renseignement pour le facture
 </div>
 <div class="card-body">
 @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div><br />
 @endif
 <form method="get" action="{{route('factureStore')}}">

 <div class="form-group">
 <label for="num_patient">num_patient:</label>
 <input type="text" class="form-control" name="num_patient"/>
 </div>
 <div class="form-group">
 @csrf
 <label for="date_facture">date_facture:</label>
 <input type="date" class="form-control" name="date_facture"/>
 </div>
 <div class="form-group">
 <label for="date">date_entree:</label>
 <input type="date" class="form-control" name="date_entree"/>
 </div>
 
 <div class="form-group">
 <label for="num_facture">num_facture:</label>
 <input type="text" class="form-control" name="num_facture"/>
 </div>
 
 <div class="form-group">
 <label for="montant_facture">montant_facture:</label>
 <input type="text" class="form-control" name="montant_facture"/>
 </div>
 <div class="form-group">
 <label for="nom_prest">nom_prest:</label>
 <input type="text" class="form-control" name="nom_prest"/>
 </div>

 <div class="form-group">
 <label for="nombre_prest">nombre_prest:</label>
 <input type="text" class="form-control" name="nombre_prest"/>
 </div>

 <div class="form-group">
 <label for="ref_prest">ref_prest:</label>
 <input type="text" class="form-control" name="ref_prest"/>
 </div>

 <div class="form-group">
 <label for="ref_prest">date_prest:</label>
 <input type="date" class="form-control" name="date_prest"/>
 </div>


 <div class="form-group">
 <label for="prix_prest">prix_prest:</label>
 <input type="text" class="form-control" name="prix_prest"/>
 </div>
 
 <button type="submit" class="btn btn-primary">Valider</button>
 </form>
 </div>
</div>


@endsection












