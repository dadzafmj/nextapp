<?php
require('..\fpdf.php');
class PDF extends FPDF
{
//En-tête
function Header()
{
//recuperation des renseignements a afficher
include('..\en_tete_pdf2.php');
//defintion des cordonnees
$long = 31.5;
$l1 = $long/2;$l2 = $long*5/2;$l3 = $long*3/4;$l4 = $long*5/4;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$y0 = 55;$dy = 6;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',11);
$y = $y0;
$this->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
$this->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
$this->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
$this->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
$this->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
$this->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
$this->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
$y = $y+$dy;
$this->Text($x0+$dx,$y,' N');
$this->Text($x1+12*$dx,$y,'Designation');
$this->Text($x2+$dx,$y,'Nbre');
$this->Text($x3+5*$dx,$y,'Montant');
$this->Text($x4+$dx,$y,'Maj_CDS');
$y=$y+$ddy;
$this->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
}
//Pied de page
function Footer()
{
  $this->SetFont('Arial','',8);
  $this->Text(105,290,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Fin de l'en-tête 

//Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//renseignement a afficher
$choix = $_POST['choix'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$annee = $_POST['annee'];
//definition des cordonnees
$long = 31.5;
$l1 = $long/2;$l2 = $long*5/2;$l3 = $long*3/4;$l4 = $long*5/4;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$l00 = 5;$h00 = 5;$x00 = 120;$y00 = 10;$x10 = 200;
$dy = 6;$ddy = 2;
include('..\connection_pcu.php');
require('..\fonctions_pcu.php');
//renseignement agent
	$ytitre = 45;
	$xtitre = 50;
	$ytitre2 = $ytitre+7;
//$num_BE = "001";$date_envoi = "01/06/2019";$destinataire = "FINANCE";
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','u',14);
$pdf->Text($xtitre,$ytitre,'PRESTATIONS RENDUES');
if($choix=='periode')
{
	$pdf->SetFont('Arial','',12);
	$pdf->Text($xtitre,$ytitre2,'PERIODE DU '.dateFR($date_debut).' ET '.dateFR($date_fin).'');
}else
{
	$pdf->Text($xtitre,$ytitre2,'ANNEE : '.$annee.'');
	$date_debut = ''.$annee.'01-01';$date_fin = ''.$annee.'12-31';
}
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;

$total_montant=0;
$total_maj_cds=0;
$total_remise=0;

$sql1 = "SELECT `doss_patient`,`date_fact` FROM `mouv_statistique` WHERE `date_fact` BETWEEN '$date_debut' AND '$date_fin'";
$req1 = mysql_query($sql1);
//premier enregistrement
	while($res1 = mysql_fetch_array($req1))
	{
		$doss_patient = $res1['doss_patient'];
		$date_fact = $res1['date_fact'];
		$sql2 = "SELECT `code_fam`,`montant`,`maj_cds`,`remise` FROM `mouv_prestation_rendue` WHERE `doss_patient` LIKE '$doss_patient' AND `etat` IS NULL";
		$pdf->SetFont('Arial','',11);
		$pdf->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
		$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
		$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
		$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
		$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
		$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
		$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
		$y = $y+$dy;
		$req2 = mysql_query($sql2);
		while($res2 = mysql_fetch_array($req2))
		{
			$code_fam = $res2['code_fam'];
			$montant = $res2['montant'];
			$maj_cds = $res2['maj_cds'];
			$remise = $res2['remise'];
		}
		$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.$code_fam.'',0,0,'C');
		$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$doss_patient.','.$date_fact.'',0,0,'C');
		$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($montant-$remise,0,","," ").'',0,0,'R');
		$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($remise,0,","," ").'',0,0,'R');
		$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($maj_cds,0,","," ").'',0,0,'R');
		$y = $y+$ddy;
		$pdf->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
		$total_montant = $total_montant + $montant;
		$total_maj_cds = $total_maj_cds + $maj_cds;
		$total_remise = $total_remise + $remise;

		if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	}
	$pdf->SetFont('Arial','B',12);	
//	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
//	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($total_montant,0,","," ").'',0,0,'R');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($total_maj_cds,0,","," ").'',0,0,'R');

	$pdf->Line($x0,$y+$ddy,$x5,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>