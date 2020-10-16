<html>
<head>
<title>POLYCLINIQUE UNIVERSITAIRE NEXT</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="file:/style/style_clinique.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style>
<script language="JavaScript">
<!--

function vohao(name, url, left, top, width, height, toolbar, menubar, statusbar, scrollbar, resizable)
{
  toolbar_str = toolbar ? 'yes' : 'no';
  menubar_str = menubar ? 'yes' : 'no';
  statusbar_str = statusbar ? 'yes' : 'no';
  scrollbar_str = scrollbar ? 'yes' : 'no';
  resizable_str = resizable ? 'yes' : 'no';
  window.open(url, name, 'left='+left+',top='+top+',width='+width+',height='+height+',toolbar='+toolbar_str+',menubar='+menubar_str+',status='+statusbar_str+',scrollbars='+scrollbar_str+',resizable='+resizable_str);
}
//-->
</script>
</head>
<body>

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><font face="Tahoma"><span style="font-size:18pt;">Liste des PRESTATIONS</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<center><form name="form1" method="post" action="consultation_prest_oui.php">
  <table width="50%" align="center" bgcolor="#CCCCCC">
   	
   <tr>
   		<?php 
		if($choix=='parservice')
		{
		echo"<td width=\"60%\"><input name=\"choix\" type=\"radio\" value=\"parservice\" checked>Par Service </td>";
		}else
		{
		echo"<td width=\"60%\"><input name=\"choix\" type=\"radio\" value=\"parservice\">Par Service </td>";
		}
		?>
 	   	<td width="50%">
<select name = "ref_service">
<?php
$req0 = mysql_query("SELECT nom_service FROM service WHERE ref_service = '$ref_service'");
	while ($res0 = mysql_fetch_array($req0))
	{
		$nom_service0 = $res0['nom_service'];
	}
	echo"<option selected value = \"$ref_service\">$nom_service0</option>";
	$nom_service_selected = $nom_service0;
	$ref_service_selected = $ref_service;
	$req1 = mysql_query("SELECT * FROM service ORDER by ref_service");
	while ($res1 = mysql_fetch_array($req1))
	{
		$nom_service = $res1['nom_service'];
		$ref_service = $res1['ref_service'];
		echo"<option value = \"$ref_service\">$nom_service</option>";
	}
?>
</select>
		</td>
   </tr>
	<tr>
	<?php 
	if($choix=='parprest')
	{
	echo"<td width=\"50%\"><input name=\"choix\" type=\"radio\" value=\"parprest\" checked>Par Prestation </td>";
	}
	else
	{
	echo"<td width=\"50%\"><input name=\"choix\" type=\"radio\" value=\"parprest\">Par Prestation </td>";
	}
	?>
	<td width="50%"><input name="prest" value=<?php echo"$prest"?>></td>
	</tr>
	<tr>
		<?php 
		if($choix!='tous')
		{
		echo"<td width=\"50%\"><input name=\"choix\" type=\"radio\" value=\"tous\">Tous </td>";
		}else
		{
		echo"<td width=\"50%\"><input name=\"choix\" type=\"radio\" value=\"tous\" checked>Tous </td>";
		}
		?>

   <td>
   <input type="submit" value="Afficher">
   </td>
   </tr></table>
</form></center>
<?php 
switch($choix)
	{
	case 'parservice':
	{echo"<p align=\"center\" <font face=\"Tahoma\"><span style=\"font-size:18pt;\">Service :  $nom_service_selected </p>";}	
	break;
	case 'parprest':
	{echo"<p align=\"center\" <font face=\"Tahoma\"><span style=\"font-size:18pt;\">Résultat de la recherche</p>";}
	break;
	case 'tous':
	{echo"<p align=\"center\" <font face=\"Tahoma\"><span style=\"font-size:18pt;\">Liste de toutes les prestations </p>";}
	break;
	}
//Pour éviter la réecriture du code

function afficheligne($txt, $ftcouleur, $align,$col, $idtst)
	{
	echo"<td id=\"".$txt."\" style=\"color:#".$ftcouleur. "; font face=Tahoma;text-align:".$align[0].";\">".$col[0]."</td>";
	echo"<td id=\"".$txt."\" style=\"color:#".$ftcouleur."; font face=Tahoma;text-align:".$align[1].";\">".$col[1]."</td>";
	echo"<td id=\"".$txt."\" style=\"color:#".$ftcouleur."; font face=Tahoma;text-align:".$align[2].";\">".$col[2]."</td>";
	echo"<td id=\"".$txt."\" style=\"color:#".$ftcouleur."; font face=Tahoma;text-align:".$align[3].";\">".$col[3]."</td>";
	echo"<td id=\"".$txt."\" style=\"color:#".$ftcouleur."; font face=Tahoma;text-align:".$align[4].";\">".$col[4]."</td>";
	}
echo"<table border=\"0\" cellspacing=\"1\" align=\"center\">";
echo"<tr height=\"20\" bgcolor=\"#32CD32\">";
		switch($choix)
		{
		case 'parservice':
		{
		$sql="select * from `prestations` where `ref_service`='$ref_service_selected' order by `ref_prestation`";
		$requete=1;
		}
		break;
		case 'parprest':
		{
		$sql="select * FROM `prestations` WHERE `nom_prestation` REGEXP '^$prest' ORDER BY `nom_prestation`"; 
		$requete=2;
		}
		break;
		case 'tous':
		{
		$sql="select * from `prestations` order by `ref_prestation`";
		$requete=3;
		}
		break;
		}
		
		$resultat=mysql_query($sql);
		
		echo"<table border=\"0\" cellspacing=\"1\" align=\"center\">";
		echo"<tr height=\"20\" bgcolor=\"#32CD32\">";
			//en tête
			$col1[0]="Numero";$col1[1]="Designation";$col1[2]="Prix[Ariary]";$col1[3]="Service";$col1[4]="Sous-service";
			$align[0]="center";$align[1]="left";$align[2]="center";$align[3]="center";$align[4]="center";
			echo"<td>&nbsp;</td>";
			afficheligne('txt4','FFFFFF', 'center', $col1,0);
			echo"<td>Modifier</td><td>Effacer</td>";
			echo"</tr>";
		
		$i=0;
		while ($ligne=mysql_fetch_array($resultat))
			{
				$i++;
				$col1[0]=$ligne['ref_prestation']; 
				$col1[1]=$ligne['nom_prestation']; 
				$col1[2]=$ligne['prix_prestation']; 
				$col1[3]=$ligne['ref_service'];
				$col1[4]=$ligne['ref_sous_service']; 
				$ref_service = $col1[3];
				$align[0]="center";$align[1]="left";$align[2]="right";$align[3]="right";$align[4]="right";
				if($i%2==0)
					{
						echo"<tr height=\"20\" bgcolor=\"#DDDDDD\">";
					}
				else
					{
						echo"<tr height=\"20\" bgcolor=\"#CCCCCC\">";
					}
				echo"<td align=\"center\">$i</td>";
				afficheligne('txt3','555555', $align, $col1,$ligne['ref_prestation']);
				echo"<td align=\"center\"><a href=\"formulaire_modifier_prest.php?prest=$prest&ref_service=$ref_service&choix=$choix&ref_prestation=".$ligne['ref_prestation']."\"><img src=\"..\images/modif.gif\" border=\"0\" alt=Modifier_une_prestation></a></td>";
				echo"<td align=\"center\"><a href=\"suppression_prest.php?prest=$prest&ref_service=$ref_service&choix=$choix&ref_prestation=".$ligne['ref_prestation']."\" onclick=\"return confirm('Etes vous sur de vouloir supprimer cette prestation?');\">
				<img src=\"..\images/del.gif\" border=\"0\" alt=supprimer></a></td>";
				echo"</tr>";
			}
	echo"</table>";
			
?>
<table align = "center" width = "50%">
	<tr>&nbsp;</tr>
	<tr>
	<?php 
	$left=100;$top=50;$larg=800;$haut=600;
	if($choix=='parservice')
	{
        echo"<td><div align=\"center\" class=\"Style6\"><input type = \"button\" value = \"Nouvelle Prestation\" onclick = \"javascript:vohao('win', 'formulaire_ajouter_prest.php?ref_service=$ref_service_selected', $left, $top, $larg, $haut, 0, 0, 1, 1, 1)\" target=\"_self\"></div></td>";
	}
	echo"<td><input type = \"button\" value = \"Fermer\" onclick = \"javascript:window.close()\"></td>";
	?>
	</tr>
</table>
</body>
</html>
<?php 
mysql_close();
?>
