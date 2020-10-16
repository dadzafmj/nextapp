<?php
//recuperation
$option = $_POST['option'];
switch($option)
{
	case 0:include('statistique_patients.php');break;	
	case 1:include('statistique_par_prestation.php');break;	
	case 2:include('statistique_prestations_externes.php');break;
	case 3:include('statistique_consultations.php');break;
	case 4:include('statistique_hospitalisation_pcu.php');break;	
	case 5:include('statistique_par_details_prestation.php');break;
	case 6:include('statistique_par_docteur.php');break;
	case 7:include('statistique_etat_sortie.php');break;
}
?>