<?php
require('..\fpdf.php');
class PDF extends FPDF
{
//En-t�te
function Header()
{
//recuperation des renseignements a afficher
include('..\en_tete_pdf2.php');
//defintion des cordonnees
$long = 21;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$y0 = 50;$dy = 4.75;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',10);
$y = $y0;
$this->Line($x0,$y,$x9,$y);//ligne horizontale de l'en-tete de colonne
$this->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
$this->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
$this->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
$this->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
$this->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
$this->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
$this->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
$this->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
$this->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8
$this->Line($x9,$y,$x9,$y+$dy+$ddy);//ligne verticale en x9

$y = $y+$dy;
$this->Text($x0+$dx,$y,' N');
$this->Text($x1+5*$dx,$y,'Dates');
$this->Text($x2+$dx,$y,'M�decine');
$this->Text($x3+$dx,$y,'Chirurgie');
$this->Text($x4+$dx,$y,'Maternite');
$this->Text($x5+$dx,$y,'Pédiatrie');
$this->Text($x6+$dx,$y,'Urgence');
$this->Text($x7+$dx,$y,'Autres');
$this->Text($x8+$dx,$y,'TOTAL');
$y=$y+$ddy;
$this->Line($x0,$y,$x9,$y);//ligne horizontale de l'en-tete de colonne
}
//Pied de page
function Footer()
{
  $this->SetFont('Arial','',8);
  $this->Text(105,290,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Fin de l'en-t�te 

//Instanciation de la classe d�riv�e
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//renseignement a afficher
$choix = $_POST['choix'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$annee = $_POST['annee'];
//definition des cordonnees
$long = 21;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$l00 = 5;$h00 = 5;$x00 = 120;$y00 = 10;$x10 = 200;
$dy = 4.75;$ddy = 2;
include('..\connection_pcu.php');
	$ytitre = 45;
	$xtitre = 15;
	$ytitre2 = $ytitre+7;
//$num_BE = "001";$date_envoi = "01/06/2019";$destinataire = "FINANCE";
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','u',14);
require('..\fonctions_pcu.php');
if($choix=='periode')
{
//	$pdf->SetFont('Arial','',12);
	$pdf->Text($xtitre,$ytitre,'MONTANT PAR SERVICE (HOSP): du '.dateFR($date_debut).' au '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT  `date_fact` FROM  `mouv_statistique` WHERE  `date_fact` BETWEEN  '$date_debut' AND  '$date_fin' ORDER BY `date_fact`";
}else
{
//	$pdf->Text($xtitre,$ytitre2,'ANNEE : '.$annee.'');
	$date_debut = ''.$annee.'-01-01';
	$date_fin = ''.$annee.'-12-31';	
	$pdf->Text($xtitre,$ytitre,'MONTANT PAR SERVICE : du '.dateFR($date_debut).' au '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT  `date_fact` FROM  `mouv_statistique` WHERE  `date_fact` BETWEEN  '$date_debut' AND  '$date_fin' ORDER BY `date_fact`";
}
$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 50;$ymax=290;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$count=0;
$total_med=0;
$total_chi=0;
$total_mat=0;
$total_ped=0;
$total_urg=0;
$total_soin=0;
$total_autres=0;
$total_total=0;
while($res1 = mysql_fetch_array($req1))
{
	$count = $count+1;
	$date_fact = $res1['date_fact'];
	$affiche = dateFR($date_fact);
	$sql2 = "SELECT `doss_patient`,`net_fact` FROM `mouv_statistique` WHERE `date_fact`='$date_fact' AND `ferme`='1' AND `type_adm` LIKE 'HOSP'";
	$req2 = mysql_query($sql2);
	//initialisation a chaque changement de date
	$montant_med=0;$montant_chi=0;$montant_mat=0;$montant_ped=0;$montant_urg=0;$montant_soin=0;$montant_autres=0;$montant_total=0;
	while($res2 = mysql_fetch_array($req2))
	{
		$net_fact = $res2['net_fact'];
		$doss_patient = $res2['doss_patient'];
		$sql3 = "SELECT `code_sce` FROM `mouv_hebergement` WHERE `doss_patient` LIKE '$doss_patient'";
		$req3 = mysql_query($sql3);
		while($res3 = mysql_fetch_array($req3))
		{
			$code_sce = $res3['code_sce'];
			switch($code_sce)
			{
				case 12 : $montant_med = $montant_med + $net_fact;break;
				case 13 : $montant_ped = $montant_ped + $net_fact;break;
				case 14 : $montant_chi = $montant_chi + $net_fact;break;
				case 15 : $montant_mat = $montant_mat + $net_fact;break;
				case 19 : $montant_urg = $montant_urg + $net_fact;break;
				default : $montant_autres = $montant_autres + $net_fact;break;
			}
		}
 		$montant_pha = 0;
/* 		$sql4 = "SELECT SUM(`montant`),SUM(`remise`) FROM `mouv_sortie_vente` WHERE `num_fact` = '$num_fact'";
		$req4 = mysql_query($sql4);
		while($res4 = mysql_fetch_array($req4))
		{
			$montant = $res3['SUM(`montant`)'];
			$remise = $res3['SUM(`remise`)'];
			$montant_pha = $montant_pha + $montant - $remise;
		}  */
	}
	
		$pdf->SetFont('Arial','',8);
		$pdf->Line($x0,$y,$x9,$y);//ligne horizontale de l'en-tete de colonne
		$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
		$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
		$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
		$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
		$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
		$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
		$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
		$pdf->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
		$pdf->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8
		$pdf->Line($x9,$y,$x9,$y+$dy+$ddy);//ligne verticale en x9
		
		$y = $y+$dy;
		$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($count,0,","," ").'',0,0,'C');
		$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$affiche.'',0,0,'C');
		$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($montant_med,2,","," ").'',0,0,'R');
		$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($montant_chi,2,","," ").'',0,0,'R');
		$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($montant_mat,2,","," ").'',0,0,'R');
		$pdf->setXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($montant_ped,2,","," ").'',0,0,'R');
		$pdf->setXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($montant_urg,2,","," ").'',0,0,'R');
		$pdf->setXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($montant_autres,2,","," ").'',0,0,'R');
		$montant_tot = $montant_med+$montant_chi+$montant_mat+$montant_ped+$montant_urg+$montant_autres;
		$pdf->setXY($x8+$dx,$y-$dy);$pdf->Cell($l9-2*$dx,$dy+2*$ddy,''.number_format($montant_tot,2,","," ").'',0,0,'R');

		$y = $y+$ddy;
		$pdf->Line($x0,$y,$x9,$y);//ligne horizontale de l'en-tete de colonne
		if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	$total_med = $total_med + $montant_med;
	$total_chi = $total_chi + $montant_chi;
	$total_mat = $total_mat + $montant_mat;
	$total_ped = $total_ped + $montant_ped;
	$total_urg = $total_urg + $montant_urg;	
//	$total_soin = $total_soin + $montant_soin;	
	$total_autres = $total_autres + $montant_autres;
	$total_total = $total_total + $montant_tot;
}
	$pdf->SetFont('Arial','B',8);	
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
	$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
	$pdf->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
	$pdf->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8
	$pdf->Line($x9,$y,$x9,$y+$dy+$ddy);//ligne verticale en x9
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($total_med,2,","," ").'',0,0,'R');
	$pdf->SetXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($total_chi,2,","," ").'',0,0,'R');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($total_mat,2,","," ").'',0,0,'R');
	$pdf->SetXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($total_ped,2,","," ").'',0,0,'R');
	$pdf->SetXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($total_urg,2,","," ").'',0,0,'R');
	$pdf->SetXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($total_autres,2,","," ").'',0,0,'R');
	$pdf->SetXY($x8+$dx,$y-$dy);$pdf->Cell($l9-2*$dx,$dy+2*$ddy,''.number_format($total_total,2,","," ").'',0,0,'R');

	$pdf->Line($x0,$y+$ddy,$x9,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>