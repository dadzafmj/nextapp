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
$this->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
$this->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
$this->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x3

$y = $y+$dy;
$this->Text($x0+$dx,$y,'N');
$this->Text($x1+5*$dx,$y,'Date_Adm');
$this->Text($x2+$dx,$y,'Type_adm');
$this->Text($x3+$dx,$y,'Nom et Prenom');
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
//definition des cordonnees
$long = 23.75;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$dx = 1;
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
$pdf->Text($xtitre,$ytitre,'STATISTIQUE GLOBALE DES PATIENTS');
$pdf->SetFont('Arial','',12);
$pdf->Text($xtitre,$ytitre2,'PERIODE DU '.dateFR($date_debut).' ET '.dateFR($date_fin).'');
$sql1 = "SELECT * FROM  `mouv_admission` WHERE  `date_fermeture_doss` IS NOT NULL AND `date_admis` BETWEEN  '$date_debut' AND  '$date_fin' ORDER BY `date_admis`" ;

$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$num=0;$kkk=0;
$total_homme=0;$total_femme=0;$total_lui_meme=0;$total_conjoint=0;$total_enfant=0;$total_total=0;
while($res1 = mysql_fetch_array($req1))
{
	$num++;
	$date_complet = $res1['date_admis'];
	$typ_adm = $res1['typ_adm'];
	$num_patient = $res1['num_patient'];
	$req2 = mysql_query("SELECT `nom_prenm` FROM  `mouv_patient` WHERE  `num_patient` = '$num_patient'");
	while($res2 = mysql_fetch_array($req2)){$nom_prenom = $res2['nom_prenm'];};
	$affiche = dateFR($date_complet);
if($typ_adm=='EXTE'){
	$kkk++;
	$pdf->SetFont('Arial','',11);
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x8,$y,$x8,$y+$dy+$ddy);//ligne verticale en x2
	$y = $y+$dy;
	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($kkk,0,","," ").'',0,0,'C');
	$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$affiche.'',0,0,'C');
	$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.$typ_adm.'',0,0,'C');
	$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.$nom_prenom.'',0,0,'L');
	$y = $y+$ddy;
	$pdf->Line($x0,$y,$x8,$y);//ligne horizontale de l'en-tete de colonne
}
	if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}

}
/* 	$pdf->SetFont('Arial','B',12);	
	$pdf->Line($x0,$y,$x3,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$y = $y + $dy;
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	}  */
	$pdf->Output();
?>