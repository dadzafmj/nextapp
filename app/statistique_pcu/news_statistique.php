<?php
$date_debut_insertion = $_POST['date_debut_insertion'];
$date_fin_insertion = $_POST['date_fin_insertion'];
$btn_post = $_POST['btn_post'];
include('..\connection_pcu.php');
switch($btn_post)
{
	case 'AJOUT':
	{
	$sql1 = "SELECT * FROM `mouv_facture_client` WHERE `date_fact` BETWEEN '$date_debut_insertion' AND '$date_fin_insertion'";
	$req1 = mysql_query($sql1);
	while($res1 = mysql_fetch_array($req1))
	{
		$date_fact = $res1['date_fact'];
		$num_fact = $res1['num_fact'];
		$doss_patient = $res1['doss_patient'];
		$montant_fact = $res1['montant_fact'];
		$remise_fact = $res1['remise_fact'];
		$net_fact = $res1['net_fact'];
		$reste_fact = $res1['reste_fact'];
		$paye_fact = $net_fact-$reste_fact;
		$sql2 = "SELECT `typ_adm`,`date_fermeture_doss` FROM `mouv_admission` WHERE `doss_patient` LIKE '$doss_patient'";
		$req2 = mysql_query($sql2);
		while($res2 = mysql_fetch_array($req2))
		{
			$type_adm = $res2['typ_adm'];
			$date_fermeture_doss = $res2['date_fermeture_doss'];
			if($date_fermeture_doss!=null){$ferme = 1;}else{$ferme=0;}
		}
		$sql3 = "INSERT INTO  `mouv_statistique` (`num`,`date_fact`,`num_fact`,`doss_patient`,`type_adm`,`ferme`,`montant_fact`,`remise_fact`,`net_fact`,`paye_fact`)
		VALUES (NULL ,'$date_fact','$num_fact','$doss_patient','$type_adm','$ferme','$montant_fact','$remise_fact','$net_fact','$paye_fact')";
		mysql_query($sql3);
	}
	}
	break;
	case 'SUPPR': mysql_query("DELETE FROM `mouv_statistique` WHERE `date_fact` BETWEEN '$date_debut_insertion' AND '$date_fin_insertion'");break;
	case 'UPDATE' : {};	
}
include('choix_statistique.php');
?>
