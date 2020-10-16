
@extends('layouts.app', ['pageSlug' => 'saisiedemandeOperation'])

@section('content')
@include('layouts.headers.mycards')
<style>
 .uper {
 margin-top: 40px;
 }
</style>
<div class="card uper">
 <div class="card-header">
Veuillez saisir les Iformation pour l'operation d'un patient
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
 <form method="get" action="{{route('operationStore')}}">
    <div class="form-group">
        @csrf
        <label for="num_patient">num_patient:</label>
        <input type="text" class="form-control" name="num_patient"/>
    </div>
    <div class="form-group">
        @csrf
        <label for="date_dm">nom_patient:</label>
        <input type="nom_patient" class="form-control" name="nom_patient"/>
    </div>
    <div class="form-group">
        @csrf
        <label for="prenom_patient">prenom_patient:</label>
        <input type="text" class="form-control" name="prenom_patient"/>
    </div>
    <div class="form-group">
        @csrf
        <label for="sexe_patient">sexe_patient:</label>
        <input type="text" class="form-control" name="sexe_patient"/>
    </div>
    
    <div class="form-group">
        @csrf
        <label for="date_naissance_patient">date_naissance_patient</label>
        <input type="date" class="form-control" name="date_naissance_patient"/>
    </div>
    

    <div class="form-group">
        @csrf
        <label for="date_op">date_op</label>
        <input type="date" class="form-control" name="date_op"/>
    </div>



    <div class="form-group">
        @csrf
        <label for="operateur1">operateur1</label>
        <input type="text" class="form-control" name="operateur1"/>
    </div>

    <div class="form-group">
        <label for="operateur2"> operateur2:</label>
        <input type="text" class="form-control" name="operateur2"/>
    </div>

    

    <div class="form-group">
        <label for="operateur3"> operateur3:</label>
        <input type="text" class="form-control" name="operateur3"/>
    </div>
    


    <div class="form-group">
        <label for="operateur4">operateur4:</label>
        <input type="text" class="form-control" name="operateur4"/>
    </div>
    <div class="form-group">
        <label for="anesthesiste1">anesthesiste1:</label>
        <input type="text" class="form-control" name="anesthesiste1"/>
    </div>
    <div class="form-group">
        <label for="anesthesiste2">anesthesiste2:</label>
        <input type="text" class="form-control" name="anesthesiste2"/>
    </div>
    <div class="form-group">
        <label for="infirmier1">infirmier1:</label>
        <input type="text" class="form-control" name="infirmier1"/>
    </div>
    
    <div class="form-group">
        <label for="infirmier2">infirmier2:</label>
        <input type="text" class="form-control" name="infirmier2"/>
    </div>

    <div class="form-group">
        <label for="anesthesiste3">anesthesiste3:</label>
        <input type="text" class="form-control" name="anesthesiste3"/>
    </div>

    <div class="form-group">
        <label for="anesthesiste4">anesthesiste4:</label>
        <input type="text" class="form-control" name="anesthesiste4"/>
    </div>

    <div class="form-group">
        <label for="infirmier3">infirmier3:</label>
        <input type="text" class="form-control" name="infirmier3"/>
    </div>

    <div class="form-group">
        <label for="infirmier4">infirmier4:</label>
        <input type="text" class="form-control" name="infirmier4"/>
    </div>

    <div class="form-group">
        <label for="type_intervention">type_intervention:</label>
        <input type="text" class="form-control" name="type_intervention"/>
    </div>

    <div class="form-group">
        <label for="nombre_ko"> nombre_ko:</label>
        <input type="text" class="form-control" name="nombre_ko"/>
    </div>

<div class="form-group">
        <label for="ec_md"> indication:</label>
        <input type="text" class="form-control" name="indication"/>
    </div>

    <div class="form-group">
        <label for="heure_entree">heure_entree:</label>
        <input type="time" class="form-control" name="heure_entree"/>
    </div>

    <div class="form-group">
        <label for="heure_debut_op">heure_debut_op:</label>
        <input type="time" class="form-control" name="heure_debut_op"/>
    </div>

    <div class="form-group">
        <label for="heure_fin_op">heure_fin_op:</label>
        <input type="time" class="form-control" name="heure_fin_op"/>
    </div>

<div class="form-group">
        <label for="heure_sortie">heure_sortie:</label>
        <input type="time" class="form-control" name="heure_sortie"/>
    </div>


    <div class="form-group">
        <label for="actes_op">actes_op:</label>
        <input type="text" class="form-control" name="actes_op"/>
    </div>
    
    <div class="form-group">
        <label for="consignes_part">consignes_part:</label>
        <input type="text" class="form-control" name="consignes_part"/>
    </div>
    <button type="Valider" class="btn btn-primary">valider</button>
 </form>
 </div>
</div>
@endsection

























