@extends('layouts.app')

@section('content')
<section class = "wrapper">
<div class="col-8">
    
        <h3 class="mb-0">{{ __('Statistique globale ') }}</h3>
            <form method = "POST"  action="{{route('statistiqueGlobalExport')}}" class ="float-right">
                    @csrf
                    <input type = "hidden" name ="date_debut" value = "{{$date_debut}}">
                    <input type = "hidden" name ="date_fin" value = "{{$date_fin}}">
                    <button class="btn btn-danger" type="submit">Export</button>
            </form>
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

    <table class="table">
                            <thead >
                              <th scope="col" class ="text text-success align-items-center" > date_fact</th>
                              <th scope="col" class ="text text-success align-items-center">montant_fact</th>
                              <th scope="col" class ="text text-success align-items-center">remise_fact</th>
                              <th scope="col" class ="text text-success align-items-center">net_fact</th>
                              <th scope="col" class ="text text-success align-items-center">paye_fact</th>
                              <th scope="col" class ="text text-success align-items-center"> reste</th>
                             
                            </thead>
                            <tbody>
                            @foreach($statistiqueGlobales as $statistiqueGlobale)


                                @foreach($statistiqueGlobale as $data)
                                    <tr>
                                        <td> <p class ="text text-danger">{{$data['date_fact']}} </p></td>
                                        <td> <p class ="text text-primary"> {{$data['montant_fact'] }} </p> </td>
                                        <td>{{$data['remise_fact'] }}</td>
                                        <td>{{$data['net_fact'] }}</td>
                                        <td>{{$data['paye_fact'] }}</td>
                                        <td>{{$data['reste'] }}</td>
                                        
                                    </tr>
                                @endforeach

                            @endforeach
                            </tbody>
                          </table>


<section>


@endsection