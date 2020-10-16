<?php
include('..\en_tete_php.php');
$date = new DateTime();
$date_debut_insertion = $date->format('Y-m-01');
$date_fin_insertion = $date->format('Y-m-t');
//$date_debut = '2019-06-01';
?>
<html>
<body>
<CENTER>
<div align="center" class="Style6">ACTION STATISTIQUE</div>
</center>
<form name = "form1" method  = "post" action = "news_statistique.php">
<table border ="0" align="center" bgcolor="#CCCC99">
<tr>
<td>PERIODE DU : </td>
<td><input name="date_debut_insertion" type="date" value="<?php echo($date_debut_insertion);?>"></input>
AU<input name="date_fin_insertion" type="date" value="<?php echo($date_fin_insertion);?>"></input></td>
</tr>
</table>
<p><div>
<center>
<input name = "btn_post" type  = "submit" value ="AJOUT"></input>
<input name = "btn_post" type  = "submit" value ="UPDATE"></input>
<input name = "btn_post" type  = "submit" value ="SUPPR"></input>
</center>
</div></p>
</form>
</body>
</html>
