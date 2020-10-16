<?php  
require('..\fpdf.php');
require('..\fonctions.php');
//Connexion Ã  la base de donnÃ©es 
class PDF extends FPDF
{
//En-tÃªte
function Header()
{
//recuperation des renseignements a afficher
include('..\en_tete_pdf2.php');
//defintion des cordonnees
$l1 = 10;$l2 = 30;$l3 = 30;$l4 = 90;$l5 = 30;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$dx = 1;
$y0 = 55;$dy = 6;$ddy = 2;
$this->SetDrawColor(0,0,0);
$this->SetTextColor(51,51,51);
$this->SetFont('Arial','B',12);
$y = $y0;
$this->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
$this->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
$this->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
$this->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
$this->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
$this->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x4
$this->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x5
$y = $y+$dy;
$this->Text($x0+$dx,$y,' N° ');
$this->Text($x1+$dx,$y,'Dates');
$this->Text($x2+$dx,$y,'Factures');
$this->Text($x3+$dx,$y,'Patients');
$this->Text($x4+$dx,$y,'MONTANT');
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
// Fin de l'en-tÃªte 

//Instanciation de la classe dÃ©rivÃ©e
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//definition des cordonnees
$l1 = 10;$l2 = 30;$l3 = 30;$l4 = 90;$l5 = 30;
$x0 = 10;$x1 = $x0+$l1;$x2 = $x1+$l2;$x3 = $x2+$l3;$x4 = $x3+$l4;$x5 = $x4+$l5;$dx = 1;
$l00 = 5;$h00 = 5;$x00 = 120;$y00 = 10;$x10 = 200;
$dy = 6;$ddy = 2;
//renseignement a afficher
$nombre = $_POST['nombre'];
$dates = $_POST['dates'];
$patients = $_POST['patients'];
$montants = $_POST['montants'];
$factures = $_POST['factures'];
$num_BE = $_POST['num_BE'];


$date_envoi = $_POST['date_envoi'];
$jour = date('d',strtotime($date_envoi));
$mois = date('m',strtotime($date_envoi));
$annee = date('Y',strtotime($date_envoi));

include('connection.php');


//renseignement agent
	$ytitre = 45;
	$xtitre = 50;
//	$ytitre2 = $ytitre+10;
//$num_BE = "001";$date_envoi = "01/06/2019";$destinataire = "FINANCE";
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',14);
$pdf->Text($xtitre,$ytitre,'ETAT RECAPITULATIF BE N° '.$num_BE.' du '.$jour.'/'.$mois.'/'.$annee.'');
$pdf->Line($xtitre,$ytitre+1,$xtitre+110,$ytitre+1);//ligne horizontale soulignant le titre
$pdf->SetTextColor(51,51,51);
$pdf->SetFont('Arial','',12);
$pdf->Text($x0,$ytitre+7,'Représentant les factures des soins médicaux des fonctionnaires d\'état');
//	$ytitre3 = $ytitre2+6;
$y0 = 55;$ymax=270;
$pdf->SetDrawColor(0,0,0);

$y1 = $y0+$dy+$ddy;
$y = $y1;
$num=0; 
$total=0;
for($i = 0;$i<$nombre;$i++)
{
$num = $i+1;
$date_facture = $dates[$i];
$num_facture = $factures[$i];
$nom_patient = $patients[$i];
$montant_facture = $montants[$i];
$jour0 = date('d',strtotime($date_facture));
$mois0 = date('m',strtotime($date_facture));
$annee0 = date('Y',strtotime($date_facture));
$num_fact0 = sprintf("%'03d", $num_facture);
$date0=''.$jour0.' '.$mois0.' '.$annee0.'';
	$pdf->SetFont('Arial','',11);
	$pdf->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
	$pdf->Line($x1,$y,$x1,$y+$dy+$ddy);//ligne verticale en x1
	$pdf->Line($x2,$y,$x2,$y+$dy+$ddy);//ligne verticale en x2
	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x4
	$y = $y+$dy;
	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1-2*$dx,$dy+2*$ddy,''.number_format($num,0,","," ").'',0,0,'C');
	$pdf->setXY($x1+$dx,$y-$dy);$pdf->Cell($l2-2*$dx,$dy+2*$ddy,''.$date_facture.'',0,0,'C');
	$pdf->setXY($x2+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.$num_fact0.'//'.$mois0.'-'.$annee0.'',0,0,'C');
	$pdf->setXY($x3+$dx,$y-$dy);$pdf->Cell($l4-2*$dx,$dy+2*$ddy,''.$nom_patient.'',0,0,'L');
	$pdf->setXY($x4+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($montant_facture,2,","," ").'',0,0,'R');
	$y = $y+$ddy;
	$pdf->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
	$total=$total+$montant_facture;
	if($y>$ymax)
		{
		$pdf->AddPage();
		$y=$y1;
		}
	}
	$pdf->SetFont('Arial','B',12);	
	$pdf->Line($x0,$y,$x4,$y);//ligne horizontale de l'en-tete de colonne
	$pdf->Line($x0,$y,$x0,$y+$dy+$ddy);//ligne verticale en x0
//	$pdf->Line($x3,$y,$x3,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x4,$y,$x4,$y+$dy+$ddy);//ligne verticale en x3
	$pdf->Line($x5,$y,$x5,$y+$dy+$ddy);//ligne verticale en x4
	$y = $y + $dy;
	$pdf->setXY($x0+$dx,$y-$dy);$pdf->Cell($l1+$l2+$l3-2*$dx,$dy+2*$ddy,'TOTAL',0,0,'C');
	$pdf->SetXY($x4+$dx,$y-$dy);$pdf->Cell($l3-2*$dx,$dy+2*$ddy,''.number_format($total,2,","," ").'',0,0,'R');
	$y = $y+$ddy;
	$pdf->Line($x0,$y,$x5,$y);//ligne horizontale de l'en-tete de colonne
	$y = $y+$ddy;
	$lettre_total = chifre_en_lettre($total);
	$lettre_total_maj = strtoupper($lettre_total);
	$lettre_fact = chifre_en_lettre($nombre);
	$lettre_fact_maj = strtoupper($lettre_fact);
 	if($y>$ymax)
	{
		$pdf->AddPage();
		$y=$y1;
	} 
	$pdf->setXY($x0+$dx,$y);
	$pdf->SetFont('Arial','',10);	
	$pdf->Cell(200,$dy,'Arrêtée le présent état au nombre de:'.$lettre_fact_maj.' ('.$nombre.') Factures et à la somme de : ',0,0,'L');
	$y = $y+$dy;
	$pdf->setXY($x0+$dx,$y);
	$pdf->SetFont('Arial','',10);	
	$pdf->Cell(200,$dy,''.$lettre_total_maj.'ARIARY',0,0,'L');
	$y = $y+$dy;
	$pdf->setXY($x0+$dx,$y);
	$pdf->SetFont('Arial','',10);
	$date_androany = ''.date('d').' '.mois_long(date('m')).' '.date('Y').'';
	$pdf->Cell(200,$dy,'Fait à Antsiranana le '.$date_androany.'');
	$pdf->Output();
?>