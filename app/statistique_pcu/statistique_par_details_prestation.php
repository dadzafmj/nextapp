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
$long = 23.75;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$dx = 1;
$y0 = 55;$dy = 6;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',12);
$y = $y0;
$this->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
$this->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
$this->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
$this->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
$this->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
$this->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8

$y = $y+$dy;
$this->Text($x0+$dx,$y,' N');
$this->Text($x1+$dx,$y,'Prestation');
$this->Text($x5+$dx,$y,'Nbre Total');
$this->Text($x6+15*$dx,$y,'Prix Total');
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

//definition des cordonnees
$long = 23.75;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$dx = 1;
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
$pdf->SetFont('Arial','',14);
$pdf->Text($xtitre,$ytitre,'STATISTIQUE PAR PRESCRIPTION');
if($choix=='periode')
{
	$pdf->SetFont('Arial','',12);
	$pdf->Text($xtitre,$ytitre2,'PERIODE DU '.dateFR($date_debut).' ET '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT `ref_prest` FROM `facture` WHERE `date_prest` BETWEEN '$date_debut' AND '$date_fin' ORDER BY `ref_prest`";
}else
{
	$sql1 = "SELECT DISTINCT `ref_prest` FROM `facture` ORDER BY `ref_prest`";
}
$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$num=0;
$total_nombre_prest = 0;
$total_prix_prest = 0; 
while($res1 = mysql_fetch_array($req1))
{
$num = $num+1;
$ref_prest = $res1['ref_prest'];
$sql2 = "SELECT * FROM `facture` WHERE `ref_prest` = '$ref_prest'";
$req2 = mysql_query($sql2);
$nombre_prest=0;
$prix_prest=0;
while($res2 = mysql_fetch_array($req2))
{
	$nbre = $res2['nombre_prest'];
	$prix_unitaire = $res2['prix_prest'];
	$nom_prest = $res2['nom_prest'];
	$nombre_prest = $nombre_prest + $nbre;
	$prix_prest = $prix_prest + $nbre*$prix_unitaire;
}
	$pdf->SetFont('Arial','',11);
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
	$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
	$pdf->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8
	
	$y = $y+$dy;
	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($num,0,","," ").'',0,0,'C');
	$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l1+$l2+$l3+$l4+$l5+$l6-2*$dx,$dy+2*$ddy,''.$nom_prest.'',0,0,'L');
	$pdf->setXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($nombre_prest,0,","," ").'',0,0,'C');
	$pdf->setXY($x6+$dx,$y-$dy);$pdf->Cell($l7+$l8/2-2*$dx,$dy+2*$ddy,''.number_format($prix_prest,2,","," ").'',0,0,'R');
	$y = $y+$ddy;
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	$total_nombre_prest = $total_nombre_prest+$nombre_prest;
	$total_prix_prest = $total_prix_prest+$prix_prest;
}
	$pdf->SetFont('Arial','B',12);	
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
	$pdf->Line($x6,$y,$x6,$y+$dy+$ddy);//ligne verticale en x6
	$pdf->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x8
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2+$l3+$l4+$l5-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($total_nombre_prest,0,","," ").'',0,0,'C');
	$pdf->SetXY($x6+$dx,$y-$dy);$pdf->Cell($l7+$l8/2-2*$dx,$dy+2*$ddy,''.number_format($total_prix_prest,2,","," ").'',0,0,'R');
	$pdf->Line($x0,$y+$ddy,$x8,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>