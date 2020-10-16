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
$long = 27;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$y0 = 55;$dy = 6;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',11);
$y = $y0;
$this->Line($x0,$y,$x7,$y);//ligne horizontale de l'en-tete de colonne
$this->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
$this->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
$this->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
$this->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
$this->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
$this->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
$this->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
$this->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
$y = $y+$dy;
$this->Text($x0+$dx,$y,' N');
$this->Text($x1+12*$dx,$y,'Dates');
$this->Text($x2+$dx,$y,'Médecine');
$this->Text($x3+$dx,$y,'Chirurgie');
$this->Text($x4+$dx,$y,'Maternité');
$this->Text($x5+$dx,$y,'Gynécologie');
$this->Text($x6+7*$dx,$y,'TOTAL');
$y=$y+$ddy;
$this->Line($x0,$y,$x7,$y);//ligne horizontale de l'en-tete de colonne
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
$long = 27;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$l00 = 5;$h00 = 5;$x00 = 120;$y00 = 10;$x10 = 200;
$dy = 6;$ddy = 2;
include('..\connection.php');
require('..\fonctions.php');
//renseignement agent
	$ytitre = 45;
	$xtitre = 50;
	$ytitre2 = $ytitre+7;
//$num_BE = "001";$date_envoi = "01/06/2019";$destinataire = "FINANCE";
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','u',14);
$pdf->Text($xtitre,$ytitre,'STATISTIQUE HOSPITALISATION PCU');
if($choix=='periode')
{
	$pdf->SetFont('Arial','',12);
	$pdf->Text($xtitre,$ytitre2,'PERIODE DU '.dateFR($date_debut).' ET '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT `date_complet` FROM `patient` WHERE `hospitalisation`>'0' AND `date_complet` BETWEEN '$date_debut' AND '$date_fin' ORDER BY `date_complet`";
}else
{
	$pdf->Text($xtitre,$ytitre2,'ANNEE : '.$annee.'');
	$sql1 = "SELECT DISTINCT `mois_A` FROM `patient` WHERE `annee_A` = '$annee' AND `hospitalisation`>'0' ORDER BY `mois_A`";
}
$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$num=0;
$total_med=0;
$total_mat=0;
$total_chi=0;
$total_gyn=0;
$total_total=0;
while($res1 = mysql_fetch_array($req1))
{
	$num = $num+1;
	if($choix=='periode')
	{
	$date_complet = $res1['date_complet'];
	$affiche = dateFR($date_complet);
	$sql2 = "SELECT `num_patient`,`unite_admission` FROM `patient` WHERE `date_complet` = '$date_complet' AND `hospitalisation` > '0'";
	}else
	{
	$mois_A = $res1['mois_A'];
	$affiche = ''.mois_long($mois_A).' '.$annee.'';
	$sql2 = "SELECT `num_patient`,`unite_admission` FROM `patient` WHERE `mois_A` = '$mois_A' AND `annee_A` = '$annee' AND `hospitalisation` > '0'";
	}
	$req2 = mysql_query($sql2);
	//initialisation a chaque changement de date
	$nbre_patient = 0;
	$nbre_med=0;
	$nbre_chi=0;
	$nbre_mat=0;
	$nbre_gyn=0;
	$nbre_total=0;
	while($res2 = mysql_fetch_array($req2))
	{
		$num_patient = $res2['num_patient'];
		$unite_admission = $res2['unite_admission'];
		switch($unite_admission)
		{
			case 'med':$nbre_med = $nbre_med+1;break;
			case 'chi':$nbre_chi = $nbre_chi+1;break;
			case 'mat':$nbre_mat = $nbre_mat+1;break;
			case 'gyn':$nbre_gyn = $nbre_gyn+1;break;
		}
	}
	$nbre_total = $nbre_med + $nbre_chi + $nbre_mat + $nbre_gyn;
	
		$pdf->SetFont('Arial','',11);
		$pdf->Line($x0,$y,$x7,$y);//ligne horizontale de l'en-tete de colonne
		$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
		$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
		$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
		$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
		$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
		$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
		$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
		$pdf->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
		
		$y = $y+$dy;
		$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($num,0,","," ").'',0,0,'C');
		$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$affiche.'',0,0,'C');
		$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($nbre_med,0,","," ").'',0,0,'C');
		$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($nbre_chi,0,","," ").'',0,0,'C');
		$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($nbre_mat,0,","," ").'',0,0,'C');
		$pdf->setXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($nbre_gyn,0,","," ").'',0,0,'C');
		$pdf->setXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($nbre_total,0,","," ").'',0,0,'C');
		$y = $y+$ddy;
		$pdf->Line($x0,$y,$x7,$y);//ligne horizontale de l'en-tete de colonne
		if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	$total_med = $total_med+$nbre_med;
	$total_chi = $total_chi+$nbre_chi;
	$total_mat = $total_mat+$nbre_mat;
	$total_gyn = $total_gyn + $nbre_gyn;
	$total_total = $total_total+$nbre_total;
}
	$pdf->SetFont('Arial','B',12);	
//	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
	$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
	$pdf->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($total_med,0,","," ").'',0,0,'C');
	$pdf->SetXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($total_chi,0,","," ").'',0,0,'C');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($total_mat,0,","," ").'',0,0,'C');
	$pdf->SetXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($total_gyn,0,","," ").'',0,0,'C');
	$pdf->SetXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($total_total,0,","," ").'',0,0,'C');

	$pdf->Line($x0,$y+$ddy,$x7,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>