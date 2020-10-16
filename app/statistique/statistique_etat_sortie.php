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
$long = 21.1;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9 = $x8+$l9;$dx = 1;
$y0 = 55;$dy = 6;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',12);
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
$this->Text($x1+$dx,$y,'Dates');
$this->Text($x2+$dx,$y,'Hopital');
$this->Text($x3+0.5*$dx,$y,'Volontaire');
$this->Text($x4+$dx,$y,'Guérison');
$this->Text($x5+$dx,$y,'Améliore');
$this->Text($x6+$dx,$y,'Statuquo');
$this->Text($x7+$dx,$y,'Mort');
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
// Fin de l'en-tête 

//Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//renseignement a afficher
$choix = $_POST['choix'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];

//definition des cordonnees
$long = 21.1;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9 = $x8+$l9;$dx = 1;
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
$pdf->Text($xtitre,$ytitre,'STATISTIQUE DE SORTIE HOPITALISATION');
if($choix=='periode')
{
	$pdf->SetFont('Arial','',12);
	$pdf->Text($xtitre,$ytitre2,'PERIODE DU '.dateFR($date_debut).' ET '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT `date_sortie` FROM `patient` WHERE `hospitalisation` = '2' AND `date_sortie` BETWEEN '$date_debut' AND '$date_fin' ORDER BY `date_sortie`";
}else
{
	$sql1 = "SELECT DISTINCT `date_sortie` FROM `patient` WHERE `hospitalisation` = '2' ORDER BY `date_sortie`";
}
$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$num=0;
$total_hopital=0;$total_volontaire=0;$total_guerison=0;$total_amelioration=0;$total_statuquo=0;$total_mort=0;$total_total=0;
while($res1 = mysql_fetch_array($req1))
{
$num = $num+1;
$date_sortie = $res1['date_sortie'];
$sql2 = "SELECT `decision_sortie`,`etat_patient` FROM `patient` WHERE `date_sortie` = '$date_sortie'";
$req2 = mysql_query($sql2);
$nbre_hopital=0;
$nbre_volontaire=0;
$nbre_guerison=0;
$nbre_amelioration=0;
$nbre_statuquo=0;
$nbre_mort=0;
$nbre_total=0;
while($res2 = mysql_fetch_array($req2))
{
	$decision_sortie = $res2['decision_sortie'];
	$etat_sortie = $res2['etat_patient'];
	if($decision_sortie==1){$nbre_hopital = $nbre_hopital+1;}
	if($decision_sortie==2){$nbre_volontaire = $nbre_volontaire+1;}
	switch($etat_sortie)
	{
	case '1': $nbre_guerison = $nbre_guerison+1;break;
	case '2': $nbre_amelioration = $nbre_amelioration+1;break;
	case '3': $nbre_statuquo = $nbre_statuquo+1;break;
	case '4': $nbre_mort = $nbre_mort+1;break;
	default :{}
	}
	$nbre_total=$nbre_hopital+$nbre_volontaire;
}
	$pdf->SetFont('Arial','',11);
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
	$pdf->Line($x9,$y,$x9,$y+$dy+$ddy);//ligne verticale en x9
	
	$y = $y+$dy;
	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($num,0,","," ").'',0,0,'C');
	$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$date_sortie.'',0,0,'C');
	$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($nbre_hopital,0,","," ").'',0,0,'C');
	$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($nbre_volontaire,0,","," ").'',0,0,'C');
	$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($nbre_guerison,0,","," ").'',0,0,'C');
	$pdf->setXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($nbre_amelioration,0,","," ").'',0,0,'C');
	$pdf->setXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($nbre_statuquo,0,","," ").'',0,0,'C');
	$pdf->setXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($nbre_mort,0,","," ").'',0,0,'C');
	$pdf->setXY($x8+$dx,$y-$dy);$pdf->Cell($l9-2*$dx,$dy+2*$ddy,''.number_format($nbre_total,0,","," ").'',0,0,'C');
	
	$y = $y+$ddy;
	$pdf->Line($x0,$y,$x9,$y);//ligne horizontale de l'en-tete de colonne
	if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	$total_hopital = $total_hopital+$nbre_hopital;
	$total_volontaire = $total_volontaire+$nbre_volontaire;
	$total_guerison = $total_guerison+$nbre_guerison;
	$total_amelioration = $total_amelioration+$nbre_amelioration;
	$total_statuquo = $total_statuquo+$nbre_statuquo;
	$total_mort = $total_mort+$nbre_mort;
	$total_total = $total_total+$nbre_total;
}
	$pdf->SetFont('Arial','B',12);	
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
	$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
	$pdf->Line($x7,$y,$x7,$y+$dy+$ddy);//ligne verticale en x7
	$pdf->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8
	$pdf->Line($x9,$y,$x9,$y+$dy+$ddy);//ligne verticale en x8
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($total_hopital,0,","," ").'',0,0,'C');
	$pdf->SetXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($total_volontaire,0,","," ").'',0,0,'C');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($total_guerison,0,","," ").'',0,0,'C');
	$pdf->SetXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($total_amelioration,0,","," ").'',0,0,'C');
	$pdf->SetXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($total_statuquo,0,","," ").'',0,0,'C');
	$pdf->SetXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($total_mort,0,","," ").'',0,0,'C');
	$pdf->SetXY($x8+$dx,$y-$dy);$pdf->Cell($l9-2*$dx,$dy+2*$ddy,''.number_format($total_total,0,","," ").'',0,0,'C');

	$pdf->Line($x0,$y+$ddy,$x9,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>