<?php
include('..\connection.php');
$req1 = mysql_query("select `id_facture`, `nom_prest` from `facture`");
while($res1 = mysql_fetch_array($req1))
{
	$id_facture = $res1['id_facture'];
	$nom_prestation = $res1['nom_prest'];
	$req2 = mysql_query("select `ref_prestation` from `prestations` where `nom_prestation` = '$nom_prestation'");
while($res2 = mysql_fetch_array($req2))
{
	$ref_prestation = $res2['ref_prestation'];
	$req3 = mysql_query("update `facture` set `ref_prest` = '$ref_prestation' where `id_facture` = '$id_facture'");
}	
}
?>