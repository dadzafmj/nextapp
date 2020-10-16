@extends('layouts.app', ['pageSlug' => ''])

@section('content')
@include('layouts.headers.mycards')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Demander une prise en charge
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
      <form method="get" action="{{ route('demandePrestationStore') }}">
          <div class="form-group">
              @csrf
              <label for="ref_prest">ref_prest:</label>
              <input type="text" class="form-control" name="ref_prest"/>
          </div>
<!--
          <div class="form-group">
              <label for="idprest">idprest :</label>
              <input type="text" class="form-control" name="idprest"/>
          </div>
-->
          <div class="form-group">
              <label for="nom_prest">nom_prest :</label>
              <input type="text" class="form-control" name="nom_prest"/>
          </div>

          <div class="form-group">
              <label for="num_patient">num_patient :</label>
              <input type="text" class="form-control" name="num_patient"/>
          </div>

          <div class="form-group">
              <label for="nombre_prest">nombre_prest :</label>
              <input type="text" class="form-control" name="nombre_prest"/>
          </div>

          <div class="form-group">
              <label for="prix_prest">prix_prest:</label>
              <input type="text" class="form-control" name="prix_prest"/>
          </div>

          <div class="form-group">
              <label for="date_prest">date_prest:</label>
              <input type="date" class="form-control" name="date_prest"/>
          </div>

          <button type="submit" class="btn btn-primary">Demander</button>
      </form>
  </div>
</div>
@endsection










