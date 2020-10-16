<!DOCTYPE html>
<html >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Next Polyclinique</title>
  
  @include('cssAccueil')
</head>
<body>
  <section class="menu cid-rbmbAelA8q" once="menu" id="menu1-0">

    
    

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="navbar-brand">
            
            <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="#">NEXTapp
                </a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                
            </div>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{ route('createPatient') }}">
                      Gestion patient
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{route('listePrestation')}}">
                        Gestion prestation
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{route('sortie_vente')}}">
                    Bilan financière
                    </a>
             </li>
            
            <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{ route('voirStatistiqueForm')  }}">
                        Gestion statistique
                    </a>
             </li>

             <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{ route('user.index')  }}">
                        Gestion utilisateur
                    </a>
             </li>

            
            </ul>
            
            <div class="navbar-buttons mbr-section-btn">
                
            <form  action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit" class="btn btn-sm btn-white display-4 ">{{ __('Deconecter') }}</button>
            </form>
            </div>
      </div>
    </nav>
</section>

<section class="header6 cid-rbmbBFs5NT" id="header6-1">

    

    <div class="mbr-overlay" style="opacity: 0.4;">
    </div>

    <div class="container align-left">
        <div class="row justify-content-center">
            <div class="media-container-column mbr-white col-md-10">
                <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1">Bonjour, Bienvenue sur  NEXTapp <br><strong> </strong>Application de gestion pour <strong> </strong>Polyclinique NEXT.</h1>
                
                
            </div>
        </div>
    </div>
    
</section>

<section class="features3 cid-rbmdr8RGdl" id="features3-3">
    
    

    
    <div class="container">
        <h2 class="mbr-fonts-style mb-4 align-center display-2">Nos services</h2>
        
        <div class="media-container-row">
            <div class="card col-12 col-md-4 col-lg-4">
                <div class="card-img">
                    <img src="assets/images/sweet-ice-cream-photography-79569-unsplash-676x451.jpg" alt="Mobirise" title="">
                </div>
                <div class="card-box">
                    <h4 class="card-title mbr-fonts-style align-center display-5">
                    REZ-DE-CHAUSSÉE :</h4>
                    <p class="mbr-text mbr-fonts-style align-center mbr-light display-7">Triage-urgence
Hemodialyse
Direction-administration
Pharmacie</p>
                    
                </div>
            </div>
            <div class="card col-12 col-md-4 col-lg-4">
                <div class="card-img">
                    <img src="assets/images/benjaminrobyn-jespersen-472301-unsplash-676x451.jpg" alt="Mobirise" title="">
                </div>
                <div class="card-box">
                    <h4 class="card-title mbr-fonts-style align-center display-5">
                    1ER ETAGE</h4>
                    <p class="mbr-text mbr-fonts-style align-center mbr-light display-7">
                    Bloc opératoire Chirurgie
Gynéco-obstétrique
Maternité
Salle d’accouchement</p>
                   
                </div>
            </div>
            <div class="card col-12 col-md-4 col-lg-4">
                <div class="card-img">
                    <img src="assets/images/shelly-pence-662726-unsplash-676x451.jpg" alt="Mobirise" title="">
                </div>
                <div class="card-box">
                    <h4 class="card-title mbr-fonts-style align-center display-5">
                    2EME ETAGE</h4>
                    <p class="mbr-text mbr-fonts-style align-center mbr-light display-7">
                    Médecine 
Salle de classe Présidence</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>











<section class="cid-rbmlLMGzzh" id="footer4-f">

    

    

    <div class="container">
        <div class="row">
            <div class="col-md-12 text1 col-lg-4">
                <p class="mbr-text mbr-bold links mbr-fonts-style align-left display-4"><span style="font-weight: normal;">Polyclinique <a class = "text text-primary ">NEXT   </a>             </span></p>
            </div>
            <div class="col-md-12 copyright align-right text2 col-lg-5">
                <p class="mbr-text mbr-bold mbr-fonts-style display-7"><span style="font-weight: normal;">Mention <a class = "text text-primary"> STIC </a> Polytechnique Antsiranana 2019</span></p>
            </div>
            <div class="col-lg-4 col-md-12">
                
            </div>    
        </div>
    </div>
</section>


  @include('jsAccueil')
  
  
</body>
</html>