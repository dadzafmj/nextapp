

@extends('layouts.app')

@section('content')

<section class ="wrapper">
    <div class="col-8">
        <h3 class="mb-0">{{ __('Veuillez mettre à jour le statistique') }}</h3>
    </div>
<form method="get" action="{{route('misAjourStatistique')}}">
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
                            <label for="lien_parente">Choix action:</label>
                            <select  class="form-control" name="btn_post">
                                <option>AJOUT</option>
                                <option>SUPPR</option>
                                <option>UPDATEE</option>
                            </select>
                        </div>


                        
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
</section>


@endsection














