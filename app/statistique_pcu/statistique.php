<?php
//recuperation
$option = $_POST['option'];
switch($option)
{
	case 0:include('statistique_patients.php');break;	
	case 1:include('statistique_par_admission.php');break;	
	case 2:include('statistique_prestations_externes.php');break;
	case 3:include('statistique_consultations.php');break;
	case 4:include('montant_par_service.php');break;	
	case 5:include('statistique_prestations_rendues.php');break;
	case 6:include('statistique_par_docteur.php');break;
	case 7:include('statistique_etat_sortie.php');break;
	case 8:include('montant_par_admission.php');break;	
	case 9:include('montant_globale.php');break;	
}
?>