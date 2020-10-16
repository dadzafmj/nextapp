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
$long = 19;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$y0 = 55;$dy = 6;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',11);
$y = $y0;
$this->Line($x0,$y,$x_10,$y);//ligne horizontale de l'en-tete de colonne
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
$this->Line($x_10,$y,$x_10,$y+$dy+$ddy);//ligne verticale en x_10
$y = $y+$dy;
$this->Text($x0+$dx,$y,' N');
$this->Text($x1+5*$dx,$y,'Dates');
$this->Text($x2+$dx,$y,'EXT.');
$this->Text($x3+$dx,$y,'HOSP');
$this->Text($x4+$dx,$y,'PEC');
$this->Text($x5+$dx,$y,'HPEC');
$this->Text($x6+$dx,$y,'INTP');
$this->Text($x7+$dx,$y,'HINTP');
$this->Text($x8+$dx,$y,'medic');
$this->Text($x9+$dx,$y,'TOTAL');
$y=$y+$ddy;
$this->Line($x0,$y,$x_10,$y);//ligne horizontale de l'en-tete de colonne
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
$long = 19;
$l1 = $long/2;$l2 = $long*3/2;$l3 = $long;$l4 = $long;$l5 = $long;$l6 = $long;$l7 = $long;$l8 = $long;$l9 = $long;$l_10 = $long;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$x6=$x5+$l6;$x7=$x6+$l7;$x8=$x7+$l8;$x9=$x8+$l9;$x_10=$x9+$l_10;$dx = 1;
$l00 = 5;$h00 = 5;$x00 = 120;$y00 = 10;$x10 = 200;
$dy = 6;$ddy = 2;
include('..\connection_pcu.php');
//require('..\fonctions.php');
//renseignement agent
	$ytitre = 45;
	$xtitre = 50;
	$ytitre2 = $ytitre+7;
//$num_BE = "001";$date_envoi = "01/06/2019";$destinataire = "FINANCE";
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','u',14);
$pdf->Text($xtitre,$ytitre,'STATISTIQUE PAR TYPE D ADMISSION');
require('..\fonctions_pcu.php');
if($choix=='periode')
{
	$pdf->SetFont('Arial','',12);
	$pdf->Text($xtitre,$ytitre2,'PERIODE DU '.dateFR($date_debut).' ET '.dateFR($date_fin).'');
	$sql1 = "SELECT DISTINCT  `date_admis` FROM  `mouv_admission` WHERE  `date_admis` BETWEEN  '$date_debut' AND  '$date_fin'";
}else
{
	$pdf->Text($xtitre,$ytitre2,'ANNEE : '.$annee.'');
	$date_debut = ''.$annee.'-01-01';
	$date_fin = ''.$annee.'-12-31';	
	$sql1 = "SELECT DISTINCT  `date_admis` FROM  `mouv_admission` WHERE  `date_admis` BETWEEN  '$date_debut' AND  '$date_fin'";
}
$req1 = mysql_query($sql1);
//	$ytitre3 = $ytitre2+6;
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$count=0;
$total_ext=0;
$total_exte=0;
$total_hosp=0;
$total_pec=0;
$total_hpec=0;
$total_intp=0;
$total_hintp=0;
$total_medic=0;
$total_total=0;
while($res1 = mysql_fetch_array($req1))
{
	$count = $count+1;
	$date_admis = $res1['date_admis'];
	$affiche = dateFR($date_admis);
	$sql2 = "SELECT `num` FROM `mouv_admission` WHERE `date_admis` = '$date_admis'";
	$req2 = mysql_query($sql2);
	//initialisation a chaque changement de date
	$nbre_patient = 0;
	$nbre_ext=0;
	$nbre_exte=0;	
	$nbre_hosp=0;
	$nbre_pec=0;
	$nbre_hpec=0;
	$nbre_intp=0;
	$nbre_hintp=0;
	$nbre_medic=0;
	$nbre_total=0;
	while($res2 = mysql_fetch_array($req2))
	{
		$num_patient = $res2['num'];
		$nbre_patient++;
		$sql3 = "SELECT `typ_adm` FROM `mouv_admission` WHERE `num` = '$num_patient'";
		$req3 = mysql_query($sql3);
		//initialisation a chaque changement num_patient
		$nbre_ext_patient = 0;
		$nbre_exte_patient = 0;
		$nbre_hosp_patient = 0;
		$nbre_pec_patient = 0;
		$nbre_hpec_patient = 0;
		$nbre_intp_patient = 0;
		$nbre_hintp_patient = 0;
		$nbre_medic_patient = 0;
		$nbre_medic_patient = 0;
		while($res3 = mysql_fetch_array($req3))
		{
			$typ_adm = $res3['typ_adm'];
			switch($typ_adm)
			{
				case 'EXT' : $nbre_ext_patient++;break;
				case 'EXTE' : $nbre_exte_patient++;break;
				case 'HOSP' : $nbre_hosp_patient++;break;				
				case 'HPEC' : $nbre_hpec_patient++;break;
				case 'INTP' : $nbre_intp_patient++;break;
				case 'HINT' : $nbre_hintp_patient++;break;
				case 'MEDIC': $nbre_medic_patient++;break;
				default : $nbre_pec_patient++;break;
			}
		}
		$nbre_ext = $nbre_ext + $nbre_ext_patient;
		$nbre_exte = $nbre_exte + $nbre_exte_patient;
		$nbre_hosp = $nbre_hosp + $nbre_hosp_patient;
		$nbre_pec = $nbre_pec + $nbre_pec_patient;
		$nbre_hpec = $nbre_hpec + $nbre_hpec_patient;
		$nbre_intp = $nbre_intp + $nbre_intp_patient;
		$nbre_hintp = $nbre_hintp + $nbre_hintp_patient;
		$nbre_medic = $nbre_medic + $nbre_medic_patient;
		$nbre_total = $nbre_ext + $nbre_exte + $nbre_hosp + $nbre_pec + $nbre_hpec + $nbre_intp + $nbre_hintp + $nbre_medic;
	}
		$pdf->SetFont('Arial','',11);
		$pdf->Line($x0,$y,$x_10,$y);//ligne horizontale de l'en-tete de colonne
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
		$pdf->Line($x_10,$y,$x_10,$y+$dy+$ddy);//ligne verticale en x_10
		
		$y = $y+$dy;
		$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($count,0,","," ").'',0,0,'C');
		$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$affiche.'',0,0,'C');
		$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($nbre_ext+$nbre_exte,0,","," ").'',0,0,'C');
		$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($nbre_hosp,0,","," ").'',0,0,'C');
		$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($nbre_pec,0,","," ").'',0,0,'C');
		$pdf->setXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($nbre_hpec,0,","," ").'',0,0,'C');
		$pdf->setXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($nbre_intp,0,","," ").'',0,0,'C');
		$pdf->setXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($nbre_hintp,0,","," ").'',0,0,'C');
		$pdf->setXY($x8+$dx,$y-$dy);$pdf->Cell($l9-2*$dx,$dy+2*$ddy,''.number_format($nbre_medic,0,","," ").'',0,0,'C');
		$pdf->setXY($x9+$dx,$y-$dy);$pdf->Cell($l_10-2*$dx,$dy+2*$ddy,''.number_format($nbre_total,0,","," ").'',0,0,'C');

		$y = $y+$ddy;
		$pdf->Line($x0,$y,$x_10,$y);//ligne horizontale de l'en-tete de colonne
		if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	$total_ext = $total_ext+$nbre_ext+$nbre_exte;
	$total_hosp = $total_hosp+$nbre_hosp;
	$total_pec = $total_pec+$nbre_pec;
	$total_hpec = $total_hpec + $nbre_hpec;
	$total_intp = $total_intp + $nbre_intp;
	$total_hintp = $total_hintp+$nbre_hintp;
	$total_medic = $total_medic+$nbre_medic;
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
	$pdf->Line($x9,$y,$x9,$y+$dy+$ddy);//ligne verticale en x9
	$pdf->Line($x_10,$y,$x_10,$y+$dy+$ddy);//ligne verticale en x_10
	$y = $y + $dy;

	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($total_ext,0,","," ").'',0,0,'C');
	$pdf->SetXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.number_format($total_hosp,0,","," ").'',0,0,'C');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l5-2*$dx,$dy+2*$ddy,''.number_format($total_pec,0,","," ").'',0,0,'C');
	$pdf->SetXY($x5+$dx,$y-$dy);$pdf->Cell($l6-2*$dx,$dy+2*$ddy,''.number_format($total_hpec,0,","," ").'',0,0,'C');
	$pdf->SetXY($x6+$dx,$y-$dy);$pdf->Cell($l7-2*$dx,$dy+2*$ddy,''.number_format($total_intp,0,","," ").'',0,0,'C');
	$pdf->SetXY($x7+$dx,$y-$dy);$pdf->Cell($l8-2*$dx,$dy+2*$ddy,''.number_format($total_hintp,0,","," ").'',0,0,'C');
	$pdf->SetXY($x8+$dx,$y-$dy);$pdf->Cell($l9-2*$dx,$dy+2*$ddy,''.number_format($total_medic,0,","," ").'',0,0,'C');
	$pdf->SetXY($x9+$dx,$y-$dy);$pdf->Cell($l_10-2*$dx,$dy+2*$ddy,''.number_format($total_total,0,","," ").'',0,0,'C');

	$pdf->Line($x0,$y+$ddy,$x_10,$y+$ddy);//ligne horizontale de fin de colonne
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->Output();
?>