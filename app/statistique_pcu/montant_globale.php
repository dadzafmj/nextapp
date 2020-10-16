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
$long = 24;
$l1 = $long/2;$l2 = $long;$l3 = $long/2;$l4 = $long*6/5;$l5 = $long*6/5;$l6 = $long*6/5;$l7 = $long*6/5;$l8 = $long*6/5;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$y0 = 50;$dy = 4.75;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',10);
$y = $y0;
$this->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
$this->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
$this->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
$this->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
$this->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
$this->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
$this->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
$this->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
$this->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
$this->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8

$y = $y+$dy;
$this->Text($x0+$dx,$y,' N');
$this->Text($x1+5*$dx,$y,'Dates');
$this->Text($x2+$dx,$y,'Nbre');
$this->Text($x3+$dx,$y,'Montant');
$this->Text($x4+$dx,$y,'Remise');
$this->Text($x5+$dx,$y,'Net');
$this->Text($x6+$dx,$y,'Payé');
$this->Text($x7+$dx,$y,'Reste');
$y=$y+$ddy;
$this->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
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
//$date_debut = '2019-07-01';$date_fin = '2019-07-31';
//definition des cordonnees
$long = 24;
$l1 = $long/2;$l2 = $long;$l3 = $long/2;$l4 = $long*6/5;$l5 = $long*6/5;$l6 = $long*6/5;$l7 = $long*6/5;$l8 = $long*6/5;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$l00 = 5;$h00 = 5;$x00 = 120;$y00 = 10;$x10 = 200;
$dy = 4.75;$ddy = 2;
include('..\connection_pcu.php');
//require('..\fonctions.php');
//renseignement agent
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
	$pdf->Text($xtitre,$ytitre,'ACTIVITE GLOBALE : PATIENTS PARTICULIERS, du '.dateFR($date_debut).' au '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT  `date_fact` FROM  `mouv_statistique` WHERE  `date_fact` BETWEEN  '$date_debut' AND  '$date_fin' ORDER BY `date_fact`";
}else
{
//	$pdf->Text($xtitre,$ytitre2,'ANNEE : '.$annee.'');
	$date_debut = ''.$annee.'-01-01';
	$date_fin = ''.$annee.'-12-31';	
	$pdf->Text($xtitre,$ytitre,'ACTIVITE GLOBALE : PATIENTS PARTICULIERS, du '.dateFR($date_debut).' au '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT  `date_fact` FROM  `mouv_statistique` WHERE  `date_fact` BETWEEN  '$date_debut' AND  '$date_fin' ORDER BY `date_fact`";
}
$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 50;$ymax=290;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$count=0;
$total_nbre=0;
$total_brute=0;
$total_remise=0;
$total_net=0;
$total_paye=0;
$total_reste=0;
while($res1 = mysql_fetch_array($req1))
{
	$count = $count+1;
	$date_fact = $res1['date_fact'];
	$affiche = dateFR($date_fact);
	$sql2 = "SELECT * FROM `mouv_statistique` WHERE `date_fact` = '$date_fact' AND `ferme`='1'";
	$req2 = mysql_query($sql2);
	//initialisation a chaque changement de date
	$nbre=0;
	$montant_brute=0;
	$montant_remise=0;
	$montant_net=0;
	$montant_paye=0;
	$montant_reste=0;
	while($res2 = mysql_fetch_array($req2))
	{
		$nbre = $nbre+1;
		$montant_brute = $montant_brute + $res2['montant_fact'];
		$montant_remise = $montant_remise + $res2['remise_fact'];
		$montant_net = $montant_brute - $montant_remise;
		$montant_paye = $montant_paye + $res2['paye_fact'];
		$montant_reste = $montant_net - $montant_paye; 
	}
		$pdf->SetFont('Arial','',8);
		$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
		$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
		$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
		$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
		$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
		$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
		$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
		$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
		$pdf->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
		$pdf->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8
		
		$y = $y+$dy;
		$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($count,0,","," ").'',0,0,'C');
		$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$affiche.'',0,0,'C');
		$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($nbre,0,","," ").'',0,0,'C');
		$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($montant_brute,2,","," ").'',0,0,'R');
		$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($montant_remise,2,","," ").'',0,0,'R');
		$pdf->setXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($montant_net,2,","," ").'',0,0,'R');
		$pdf->setXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($montant_paye,2,","," ").'',0,0,'R');
		$pdf->setXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($montant_reste,2,","," ").'',0,0,'R');
		$y = $y+$ddy;
		$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
		if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
		$total_nbre = $total_nbre + $nbre;
		$total_brute = $total_brute + $montant_brute;
		$total_remise = $total_remise + $montant_remise;
		$total_net = $total_net + $montant_net;
		$total_paye = $total_paye + $montant_paye;
		$total_reste = $total_reste + $montant_reste;
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
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($total_nbre,0,","," ").'',0,0,'C');
	$pdf->SetXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($total_brute,2,","," ").'',0,0,'R');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($total_remise,2,","," ").'',0,0,'R');
	$pdf->SetXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($total_net,2,","," ").'',0,0,'R');
	$pdf->SetXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($total_paye,2,","," ").'',0,0,'R');
	$pdf->SetXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($total_reste,2,","," ").'',0,0,'R');
	$pdf->Line($x0,$y+$ddy,$x8,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>