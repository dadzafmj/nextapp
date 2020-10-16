<li>
            <li>
               
                <a data-toggle="collapse" href="#gestion_patient" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion patient') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="gestion_patient">
                    <ul class="nav pl-4">
                        
                        

                                 <li class="collapse show " id="gestion_patient">
                                   <a href="{{ route('createPatient') }}">
                                        <i class="tim-icons icon-single-02"></i>
                                        <p>{{ __('Inserer patient') }}</p>
                                    </a>
                                   </li>
                                
                                   <li class="collapse show " id="gestion_patient">
                                   <a href="{{ route('listPatient') }}">
                                        <i class="tim-icons icon-bullet-list-67"></i>
                                        <p>{{ __('Listes patients') }}</p>
                                    </a>
                                   </li>

                                   <li class="collapse show " id="gestion_patient">
                                   <a href="{{ route('sortiePatient') }}">
                                        <i class="tim-icons icon-bullet-list-67"></i>
                                        <p>{{ __('Sortie patient') }}</p>
                                    </a>
                                   </li>

                                   <li class="collapse show " id="gestion_patient">
                                   <a href="{{ route('saisieDonneMedical') }}">
                                        <i class="tim-icons icon-bullet-list-67"></i>
                                        <p>{{ __('Saisie donne medical') }}</p>
                                    </a>
                                   </li>

                                   <li class="collapse show " id="gestion_patient">
                                   <a href="{{ route('operationPatient') }}">
                                        <i class="tim-icons icon-bullet-list-67"></i>
                                        <p>{{ __('Operation Patient') }}</p>
                                    </a>
                                   </li>
                    </ul>
                </div>
            </li>


            <li>
                <a data-toggle="collapse" href="#gestionFacture" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion Facturation') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="gestionFacture">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{route('formulaireInsertionFacture')}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('créer nouvel facture') }}</p>
                            </a> 
                           

                        </li>
                         <li>
                          <a href="#">
                                <i class="tim-icons create"></i>
                                <p>{{ __( 'liste des facture') }}</p>
                            </a>
                            
                        </li>
                        
                    </ul>
                </div>



         <li>
                <a data-toggle="collapse" href="#gestion_prestation" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion prestation') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="gestion_prestation">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{route('listePrestation')}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Liste choix prestation') }}</p>
                            </a> 
                           

                        </li>
                         <li>
                          <a href="{{route('demandePrestation')}}">
                                <i class="tim-icons create"></i>
                                <p>{{ __( 'Demande prestation') }}</p>
                            </a>
                            
                        </li>
                        
                        <li>
                          <a href="{{route('listePrestationRendu')}}">
                                <i class="tim-icons create"></i>
                                <p>{{ __( 'liste prestation') }}</p>
                            </a>
                            
                        </li>
                        
                    </ul>
                </div>
         </li>


            <li>
                <a data-toggle="collapse" href="#bilan_financier" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Bilan financière') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="bilan_financier">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('sortie_vente')  }}">
                                <i class="tim-icons "></i>
                                <p>{{ __('Sortie vente') }}</p>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('mouvPrestationRendue')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('MouvPrestationRendue') }}</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('montantGlobale')  }}">
                                <i class="tim-icons "></i>
                                <p>{{ __('Montant globale') }}</p>
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
            </li>


            <li>
                <a data-toggle="collapse" href="#statistique" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Statistique') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="statistique">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('statistique')  }}">
                                <i class="tim-icons "></i>
                                <p>{{ __('Exemple Statistique') }}</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>






            <li>
                <a data-toggle="collapse" href="#gestion_utilisateur" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion utilisateur') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="gestion_utilisateur">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>