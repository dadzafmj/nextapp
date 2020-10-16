@foreach($statistiqueGlobales as $statistiqueGlobale)


    @foreach($statistiqueGlobale as $data)
        {{$data['date_fact']}}
        {{$data['montant_fact']}}
        {{$data['remise_fact']}}
        {{$data['net_fact']}}
        {{$data['paye_fact']}}
        {{$data['reste']}}
    @endforeach

@endforeach