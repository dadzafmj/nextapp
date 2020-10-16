<?php
/*********************************************** 
_______       ___       ___     ____________
| _____|      |   \   /   |     |___    ____|
|  |_         |    \ /    |         |  |      
|  __|        |           |         |  |      
|  |          |   |   |   |      ___|  |      
|__|          |___|   |___|     |______/ 

Fara Marie José HAJALALAIANA 
Ecole Supérieure Polytechnique Antsiranana 2019 */
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('operation', 'gestionOperation\OperationController@index')->name('operationPatient');

Route::get('operation/store', 'gestionOperation\OperationController@operationStore')->name('operationStore');



/**-------------------------facture--------------------------------------- */

Route::get('facture', 'gestionFacture\FactureController@index')->name('formulaireInsertionFacture');

Route::get('facture/store', 'gestionFacture\FactureController@store')->name('factureStore');
	  
Route::get('factureStore/{numpatient}', 'gestionFacture\FactureController@factureStore')->name('factureStore');


Route::get('annulationfacture/{numpatient}', 'gestionFacture\FactureController@annuler_tout')->name('facture_annuler');

Route::post('/imprimerfacture','gestionFacture\FactureController@imprimer_facture')->name('imprimerfacture');































/**------------------ -------*******************------------------------ */


/**-----------------------prestation ----------------------------------------------------------*/

/**vusualiser la liste de prestation */
Route::get('prestation', 'prestation\PrestationController@index')->name('listePrestation')->middleware('accueil');
/**--------------------------------****------------------------------------------------------- */

Route::get('prestation/demande', 'prestation\PrestationController@demande')->name('demandePrestation')->middleware('accueil');

/**------------------------**********************--------------------------------------------- */
/** faire une demande de prestation du client selectioner sur le liste de client, et le prestation selectionner sur le liste de prestation.
 * les parametre : nombre de prestation est envoyer par le methode et mais les reste sont transporter par la route*/
/** '$patient->num_patient','$prestation->ref_prestation','$prestation->nom_prestation','$prestation->prix_prestation'*/
Route::post('prestation_demande_store', 'prestation\PrestationController@demandePrestationStore')->name('demandePrestationStore')->middleware('accueil');

/**--------------------------**********---------------------------------------------- */

Route::get('prestation/list', 'prestation\PrestationController@listePrestationRendu')->name('listePrestationRendu')->middleware('accueil');
Route::get('prestationForSelectedClient/{id}', 'prestation\DemandePrestationController@prestationForSelectedClient')->name('prestationForSelectedClient')->middleware('accueil');


/** --------------------------end prestation---------------------------------------------------- */

/** delete prestation */

Route::get('prestdelete/{idprest}/numpatient{numpatient}', 'prestation\PrestationController@deletePrestPatient')->name('deletePrestPatient')->middleware('accueil');
  















/**end delete prestation */
Route::get('insertionHospitalisation', function () {
	  return view('gestionPatient.prestationFonctionaire.insertionHospitalisation');
	  });
	  
	  Route::get('insertionAgent', function () {
		return view('gestionPatient.prestationFonctionaire.insertionAgent');
		});

Route::get('patient', 'gestionpatient\PatientController@index')->name('listPatient')->middleware('accueil');
Route::get('patient/create', 'gestionpatient\PatientController@create')->name('createPatient')->middleware('accueil');

Route::post('patient/store', 'gestionpatient\PatientController@store')->name('PatientController.store')->middleware('accueil');
Route::post('patient/update', 'gestionpatient\PatientController@update')->name('PatientController.update')->middleware('accueil');
Route::get('patient_recherche', 'gestionpatient\PatientController@recherche')->name('PatientController.recherche')->middleware('accueil');
Route::get('patient/sortie', 'gestionpatient\SortiePatientController@index')->name('sortiePatient')->middleware('accueil');

Route::get('patient/sortie/recherche', 'gestionpatient\SortiePatientController@recherche')->name('SortiePatientController.recherche')->middleware('accueil');
Route::post('patient/sortie/formDemandeSortie', 'gestionpatient\SortiePatientController@show')->name('SortiePatientController.show')->middleware('accueil');
Route::post('patient/sortie/store', 'gestionpatient\SortiePatientController@store')->name('SortiePatientController.store')->middleware('accueil');



Route::get('patient/donneMedical', 'gestionpatient\DossierMedicalController@index')->name('saisieDonneMedical')->middleware('accueil');
Route::post('donneMedical/show', 'gestionpatient\DossierMedicalController@show')->name('saisieDonneMedicalShow')->middleware('accueil');
Route::post('donneMedical_update/show', 'gestionpatient\DossierMedicalController@show_update')->name('saisieDonneMedicalShow_update')->middleware('accueil');
Route::post('donneMedical_update/store', 'gestionpatient\DossierMedicalController@update')->name('saisieDonneMedicalUpdateStore')->middleware('accueil');
Route::post('donneMedical/recherche', 'gestionpatient\DossierMedicalController@recherche')->name('saisieDonneMedicalRecherche')->middleware('accueil');

Route::post('donneMedical/store', 'gestionpatient\DossierMedicalController@saisieDonneMedicalStore')->name('saisieDonneMedicalStore')->middleware('accueil');

Route::post('patient/modifierPatient','gestionpatient\UpdatePatientController@index')->name('modifierPatient')->middleware('accueil');

Route::post('patient/modifierPatient/store','gestionpatient\UpdatePatientController@store')->name('modifierPatient.store')->middleware('accueil');







Route::get('export', 'DisneyplusController@export');



Route::get('disneyplus/list', 'DisneyplusController@index')->name('disneyplus.index');

Route::get('disneyplus', 'DisneyplusController@create')->name('disneyplus.create');
Route::post('disneyplus', 'DisneyplusController@store')->name('disneyplus.store');




Route::get('users/export/', 'StatistiqueController@export');
Route::get('generate-pdf','StatistiqueController@generatePDF');


Route::get('/', 'HomeController@index');
/** 
 *   Route::get('/', function () {
 *   return view('welcome');
*    });
*/




Route::get('/mouv_sortie_vente','Mouv_sortie_venteController@index')->name('sortie_vente')->middleware('auth')->middleware('administration');

Route::post('/mouv_sortie_vente/show','Mouv_sortie_venteController@index')->name('sortie_venteShow')->middleware('auth')->middleware('administration');



Route::get('/matable','MatableController@afficher');

/**Gestion statistique */



Route::get('/statistique', 'gestionStatistique\StatistiqueController@index')->name('statistique')->middleware('administration');

Route::get('/statistique/misAjour', 'gestionStatistique\StatistiqueController@misAjour')->name('misAjourStatistique')->middleware('administration');

Route::get('/statistique/voirStatistiqueForm', 'gestionStatistique\StatistiqueController@voirStatistiqueForm')->name('voirStatistiqueForm')->middleware('administration');

Route::get('/statistique/affichageStatistique', 'gestionStatistique\StatistiqueController@affichageStatistique')->name('affichageStatistique')->middleware('administration');

Route::get('/statistique/globale/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueGlobaleController@statistiqueGlobale')->name('statistiqueGlobale')->middleware('administration');


Route::get('/statistique/prestation/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiquePrestationController@statistiquePrestation')->name('statistiquePrestation')->middleware('administration');

Route::get('/statistique/docteur/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueDocteurController@statistiqueDocteur')->name('statistiqueDocteur')->middleware('administration');

Route::get('/statistique/uniteAdmission/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueUniteAdmissionController@statistiqueUniteAdmission')->name('statistiqueUniteAdmission')->middleware('administration');

Route::get('/statistique/detailsPrestation/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueDetailsPrestationController@statistiqueDetailsPrestation')->name('statistiqueDetailsPrestation')->middleware('administration');

Route::get('/statistique/sortieHospitalisation/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueSortieHospitalisationController@statistiqueSortieHospitalisation')->name('statistiqueSortieHospitalisation')->middleware('administration');
Route::get('/statistique/service/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueServiceController@statistiqueService')->name('statistiqueService')->middleware('administration');

/**export */
Route::post('/stat-Export','gestionStatistique\StatistiqueGlobaleController@export')->name('statistiqueGlobalExport')->middleware('administration');



/**----------------------------------*****************---------- */


Route::get('/Mouv_prestation_rendue','Mouv_prestation_rendueController@index')->name('mouvPrestationRendue')->middleware('administration');
Route::get('/montant_globale','montant_globaleController@index')->name('montantGlobale')->middleware('administration');
Route::post('/montant_globale','montant_globaleController@index')->name('montantGlobale')->middleware('administration');
Route::get('/montant_globale/show','montant_globaleController@show')->name('montantGlobaleShow')->middleware('administration');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth','middleware' => 'admin'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});



