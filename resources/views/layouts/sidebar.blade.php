<aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered">
                        <a href="profile.html"><img src="{{asset('img')}}/ui-sam.jpg" class="img-circle" width="80"></a>
                    </p>
                    <h5 class="centered">{{ auth()->user()->name }}</h5>
                    <li class="mt">
                        <a href="{{route('home')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    @if(auth()->user()->role==1 or auth()->user()->role==3 ) <!-- accueill-->
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Gestion Patient</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('createPatient') }}">{{ __('Inserer patient') }}</a></li>
                            <li><a href="{{ route('listPatient') }}">{{ __('Listes patients') }}</a></li>
                            <li><a href="{{ route('sortiePatient') }}">{{ __('Sortie patient') }}</a></li>
                            <li><a href="{{ route('saisieDonneMedical') }}">{{ __('Saisie donne medical') }}</a></li>
                            <li><a href="{{  route('operationPatient') }}">{{ __('Operation Patient') }}</a></li>
                            
                        </ul>
                    </li>
                  
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>{{ __('Gestion prestation') }}</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('listePrestation')}}">{{ __('Liste choix prestation') }}</a></li>
                            <li><a href="{{route('demandePrestation') }}">{{ __('Demande prestation') }}</a></li>
                            <li><a href="{{route('listePrestationRendu') }}">{{ __('liste prestation') }}</a></li>
                            
                        </ul>
                    </li>
                    @endif
                    @if(auth()->user()->role==2 or auth()->user()->role==3 )
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>{{ __('Bilan financière') }}</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('sortie_vente')}}">{{ __('Sortie vente') }}</a></li>
                            <!--<li><a href="{{  route('mouvPrestationRendue') }}">{{ __('MouvPrestationRendue') }}</a></li> -->
                            <li><a href="{{  route('montantGlobale') }}"> {{ __('Montant globale') }}</a></li>
                           
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i>
                            <span>{{ __('Statistique') }}</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('statistique')  }}">{{ __('Mis à jour statistique') }}</a></li>
                            <li><a href="{{ route('voirStatistiqueForm')  }}">{{ __('Affichage statistique') }}</a></li>
                            
                        </ul>
                    </li>
                   @endif

                   @if(auth()->user()->role==3)
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" fa fa-bar-chart-o"></i>
                            <span>{{ __('Gestion utilisateur') }}</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('profile.edit') }}">{{ __(' Profile') }}</a></li>
                            <li><a href="{{ route('user.index')  }}">{{ __('User Management') }}</a></li>
                            
                        </ul>
                    </li>
                    @endif
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>