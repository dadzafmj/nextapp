


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>facture</title>
    <link rel="stylesheet" href="{{asset('facture')}}/bootstrap.min.css" media="all" />
    <link rel="stylesheet" href="{{asset('facture')}}/style.css" media="all" />
    
  </head>
  <body>

    

    <header class="clearfix">
      
      <h3>FACTURE NUMERO: XYZ</h3>
      <div id="company" class="clearfix">
        <div>POLYCLINIQUE NEXT</div>
        <div>2.Rue de la fraternité<br />SCAMA-DIEGO/SUAREZ</div>
        <div>(-261) 34 49 110 11</div>
        <div><a href="polyclinicunivnext@ngmail.com">polyclinicunivnext@ngmail.com</a></div>
      </div>
      <div id="project">
       @foreach($patients as $patient)
        <div><span>CLIENT</span> {{$patient->nom_patient}} {{$patient->prenom_patient}}</div>
        
        <div><span>ADDRESS</span> {{$patient->adresse}}</div>
        <div><span>Telephone</span> {{$patient->tel}} </div>
        <div><span>date</span> </div>
       @endforeach
      </div>
    </header>
    <main>
    
      <table>
        <thead>
          <tr>
            <th class="service">ID</th>
            <th class="desc">Prestation</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Montant</th>
          </tr>
        </thead>
        <tbody>
<!-- -------------------------------------------------------------------------------------->
        <?php $i=0 ?> 

<!-- -------------------------------------------------------------------------------------->

          @foreach($factures as $facture)
          <tr>
            <td class="service">{{$facture->id_facture}} </td>
            <td class="desc">{{$facture->nom_prest}}</td>
            <td class="unit">{{$facture->prix_prest}}</td>
            <td class="qty">{{$facture->nombre_prest}}</td>
            <td class="total">{{$facture->montant_facture}}</td>
          </tr>
<!-- -------------------------------------------------------------------------------------->


          <?php $id[$i]=$facture->id_facture;
          $i++ ?>

<!-- -------------------------------------------------------------------------------------->


          @endforeach
          <?php $ID = implode(',', $id) ?>
         
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">{{$total}}</td>
          </tr>
          <tr>
          
          </tr>
        </tbody>
      </table>
      
    </main>

      <form method = "post" action = "{{route('imprimerfacture')}}" >
      @csrf
      
      <input type="hidden" name ="num_patient" value = "{{$patient->num_patient}}" > 
        <input type="hidden" name ="id" value = "{{$ID}}" > 
        <input type="hidden" name ="total" value = "{{$total}}" > 
        <input class = "btn btn-primary" type="submit" name ="submit" value = "valider et imprimer" > 
      </form>
      <a class ="btn btn-danger" href = "{{route('facture_annuler',$patient->num_patient)}}"> 
          annuler tous 
       </a></td>
    
    </body>
</html>
































