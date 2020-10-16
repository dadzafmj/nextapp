<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $table='patient';
    protected $connection = 'mysql2';
    protected $fillable = ['num_patient','num_court','nom_patient','prenom_patient','sexe','age','adresse','num_dossier','tel','medecin_prescripteur','date_arrive','date_remise','jour_A','mois_A','annee_A','jour_R','mois_R','annee_R','lien_parente','unite_age','nom_agent','prenom_agent','sexe_agent','im_agent','adresse_agent','service_employeur','num_visa','date_visa','signataire_visa','fonction_signataire','nomfichier','hospitalisation','unite_admission','etat_patient','diagnostic_accueil','diagnostic_sortie','chambre_patient','lit_patient','categorie_patient','date_hospitalisation','decision_sortie','date_sortie'];
    protected $updated_at='false';
    protected $created_at= 'false';
    protected $primaryKey="num_patient";
}
