<ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Accueil') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#gestion_patient" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-planet text-blue" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Gestion patient') }}</span>
                    </a>

                    <div class="collapse show" id="gestion_patient">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('createPatient') }}">
                                {{ __('Inserer patient') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('listPatient') }}">
                                {{ __('Listes patients') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sortiePatient') }}">
                                {{ __('Sortie patient') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('saisieDonneMedical') }}">
                                {{ __('Saisie donne medical') }}
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{  route('operationPatient') }}">
                                {{ __('Operation Patient') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



<!-- facture -->
                <li class="nav-item">
                    <a class="nav-link active" href="#gestionFacture" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-planet text-blue" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Gestion Facturation') }}</span>
                    </a>

                    <div class="collapse show" id="gestionFacture">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('formulaireInsertionFacture')}}">
                                {{ __('créer nouvel facture') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                {{ __( 'liste des facture') }}
                                </a>
                            </li>

                            
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{  route('operationPatient') }}">
                                {{ __('Operation Patient') }}
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>




<!-- gestion_prestation-->



                <li class="nav-item">
                    <a class="nav-link active" href="#gestion_prestation" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-planet text-blue" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Gestion prestation') }}</span>
                    </a>

                    <div class="collapse show" id="gestion_prestation">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('listePrestation')}}">
                                {{ __('Liste choix prestation') }}
                                </a>
                            </li>
                            

                            
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{  route('demandePrestation') }}">
                                {{ __('Demande prestation') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{  route('listePrestationRendu') }}">
                                {{ __('liste prestation') }}
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


<!-- bilan financiee -->


                <li class="nav-item">
                    <a class="nav-link active" href="#bilan_financier" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-planet text-blue" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Bilan financière') }}</span>
                    </a>

                    <div class="collapse show" id="bilan_financier">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('sortie_vente')}}">
                                {{ __('Sortie vente') }}
                                </a>
                            </li>
                            

                            
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{  route('mouvPrestationRendue') }}">
                                {{ __('MouvPrestationRendue') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{  route('montantGlobale') }}">
                                {{ __('Montant globale') }}
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

<!-- statistique -->


                <li class="nav-item">
                    <a class="nav-link active" href="#statistique" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-planet text-blue" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Statistique') }}</span>
                    </a>

                    <div class="collapse show" id="statistique">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('statistique')  }} ">
                                {{ __('Mis à jour statistique') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('voirStatistiqueForm')  }} ">
                                {{ __('Affichage statistique') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



<!--gestion user-->



                <li class="nav-item">
                    <a class="nav-link active" href="#gestion_utilisateur" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-planet text-blue" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Gestion utilisateur') }}</span>
                    </a>

                    <div class="collapse show" id="gestion_utilisateur">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile.edit') }} ">
                                {{ __(' Profile') }}
                                </a>
                            </li>
                            

                            
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index')  }}">
                                {{ __('User Management') }}
                                </a>
                            </li>

                            

                        </ul>
                    </div>
                </li>





                
            </ul>
            