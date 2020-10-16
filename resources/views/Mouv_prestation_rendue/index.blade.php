@extends('layouts.app', ['pageSlug' => 'mouvPrestationRendue'])
 @section('content')

<h1>All Information About Devices</h1>
 

 
<h1>Only Names Of Devices</h1>
 
@foreach ($Mouv_prestation_rendue as $device)
 
<li> {{ $device->num}}  </li>
 
@endforeach
 
<h1>Only Description Of Devices</h1>
 
@foreach ($Mouv_prestation_rendue as $device)
 
<li> {{ $device->doss_patient}}  </li>
 
@endforeach
    
@endsection