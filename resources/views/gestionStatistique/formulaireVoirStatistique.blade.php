

@extends('layouts.app')

@section('content')
<section class = "wrapper">
       
        <h3 class="mb-1">{{ __('Veuillez remplir la date et le choix de statistique à afficher') }}</h3>

        
                            
                      
                    <form method="get" action="{{route('affichageStatistique')}}">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <label for="date_debut">Date de debut:</label>
                            <input type="date" class="form-control" name="date_debut"/>
                        </div>
                        <div class="form-group">
                            <label for="date_fin">Date de fin :</label>
                            <input type="date" class="form-control" name="date_fin"/>
                        </div>
                        <div class="form-group">
                            <label for="lien_parente">Choix statistique à affficher:</label>
                            <select  class="form-control" name="option">
                                <option selected value = "1">GLOBALE</option>
                                <option value = "2">PRESTATION</option>
                                <option value = "3">DOCTEUR</option>
                                <option value = "4">UNITE ADMISSION</option>
                                <option value = "5">DETAILS PRESTATION</option>
                                <option value = "6">SORTIE HOSPITALISATION</option>
                                <option value = "7">SERVICE</option>
                            </select>
                        </div>


                        
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>


</section>

@endsection














