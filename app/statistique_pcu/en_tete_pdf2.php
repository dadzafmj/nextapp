<?php 
$this->SetDrawColor(0,0,0);
$l = 5;$h = 5;$x0 = 10;$y0 = 10;$x1 = 200;
$this->Line($x0,$y0,$x0+$l,$y0);
$this->Line($x0,$y0,$x0,$y0+$h);
$this->Line($x1-$l,$y0,$x1,$y0);
$this->Line($x1,$y0,$x1,$y0+$h);
$y1 = 40;
$this->Line($x0,$y1,$x0,$y1-$h);
$this->Line($x0,$y1,$x0+$l,$y1);
$this->Line($x1-$l,$y1,$x1,$y1);
$this->Line($x1,$y1,$x1,$y1-$h);

$this->SetFont('Arial','',20);
$this->SetTextColor(51,51,51);
$this->Text($x0+30,15,'POLYCLINIQUE UNIVERSITAIRE NEXT');
$this->SetFont('Arial','',9);
$this->Text($x0,20,'CHIRURGIE - GYNECO - OBSTETRIQUE - MEDECINE INTERNE - IMAGERIES MEDICALES - ANALYSES MEDICALES - DIALYSE');
$this->SetFont('Arial','',9);
$this->Text($x0+30,25,'NIF: 5001 347 380, RCS: 2013 B 00063 du 24/07/2013, Statistique N° 84301 71 2013 00');
$this->SetFont('Arial','',9);
$this->Text($x0+15,30,'2, Rue de la Fraternité SCAMA DIEGO-SUAREZ, Tél: +261 34 49 110, e-mail:');
$this->SetFont('Arial','',9);
$this->SetTextColor(0,0,255);
$this->Text($x0+126,30,'polycliniquenext@gmail.com');
$this->SetDrawColor(0,0,255);
$this->Line($x0+126,31,$x0+166,31);
$this->SetTextColor(50,50,50);
$this->Text($x0+50,36,'Compte BFV-SG Antsiranana N°00008 00510 05004008510 97');
?>