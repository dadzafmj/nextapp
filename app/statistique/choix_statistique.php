<?php
include('..\en_tete_php.php');
$date = new DateTime();
$date_debut = $date->format('Y-m-01');
$date_fin = $date->format('Y-m-t');
$date_debut = '2019-06-01';
//$annee_fin = date("Y-m-d",mktime(0,0,0,$mois+1,0,$annee);
?>
<html>
<body>
<CENTER>
<div align="center" class="Style6">STATISTIQUE</div>
</center>
<form name = "form1" method  = "post" action = "statistique.php">
<table border ="0" align="center" bgcolor="#CCCC99">
<tr>
<td><input name="choix" type="radio" value="periode" checked>PERIODE DU</input></td>
<td><input name="date_debut" type="date" value="<?php echo($date_debut);?>"></input>
AU<input name="date_fin" type="date" value="<?php echo($date_fin);?>"></input></td>
</tr>
<tr>
<td><input name="choix" type="radio" value="tous">ANNUELLE : </input></td>
<td><input name="annee" type="texte" size = "2" value="<?php $annee_courant = date('Y');echo($annee_courant);?>"></input></td>
</tr>
<tr>
<tr>&nbsp;</tr>
<td align = "right">OPTION</td>
<td><select name = "option">
<option selected value = "0">STATISTIQUE PATIENTS</option>
<option value = "1">STATISTIQUE GLOBALE PRESTATIONS</option>
<option value = "2">PRESTATIONS EXTERNES</option>
<option value = "3">CONSULTATIONS</option>
<option value = "4">HOSPITALISATION</option>
<option value = "5">DETAILS PRESTATION</option>
<option value = "6">MEDECINS PRESCRIPTEURS</option>
<option value = "7">RESULTAT HOSPITALISATION</option>
</select>
</td>
</tr>
</table>
<p><div>
<center>
<input type  = "submit" value ="AFFICHER"></input>
<input type  = "button" value ="FERMER" onclick = "fermer()"></input>
</center>
</div></p>
</form>
</body>
</html>
