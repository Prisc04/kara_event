<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name','laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/kara.jpg')}}"  alt="logo"/></a>
            <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}"  alt="logo" /></a>
          </div>
          <ul class="nav">
            <li class="nav-item profile">
              <div class="profile-desc">
                <div class="profile-pic">
                  <div class="count-indicator">
                    <img class="img-xs rounded-circle " src="{{asset('assets/images/admin_logo.png')}}" alt="logo">
                    <span class="count bg-success"></span>
                  </div>
                  <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal"> {{Auth::user()->admin_nom}} </h5>
                    <span>{{Auth::user()->admin_prenom}}</span>
                  </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1 text-small">paramètre du compte</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-onepassword  text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1 text-small">Change mot de passe</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar-today text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                    </div>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Navigation</span>
            </li>

            <li class="nav-item menu-items">
              <a class="nav-link" href=" {{route('admin.home')}} ">
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Tableau de bord</span>
              </a>
            </li>

            @if(Auth::user()->admin_role == 'super_admin' || Auth::user()->admin_role == 'admin' || Auth::user()->admin_role == 'root')

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#utilisateur" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Compte</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="utilisateur">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.register')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.liste')}}">Liste de tous les comptes</a></li>

                    </ul>
                    </div>
                </li>





                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#canton" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Canton</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="canton">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creercanton')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listecanton')}}">Tous les cantons</a></li>
                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Services</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="service">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Service')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeService')}}">Tous les services</a></li>
                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#type_station" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Type stations</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="type_station">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creerTypeStation')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeTypeStation')}}">Tous les types stations</a></li>
                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#lutteur" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Lutteur</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="lutteur">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_lutteur')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listelutteur')}}">Tous les lutteurs</a></li>
                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#score" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Score</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="score">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Score')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeScore')}}">Tous les scores</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#type_societe" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Type societe</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="type_societe">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_typesociete')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listetypesociete')}}">Tous les types societes</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#societe" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Société</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="societe">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_societe')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listesociete')}}">Tous les societes</a></li>
                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#type_publicite" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Type publicite</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="type_publicite">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_typepublicite')}}">Nouveau</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.listetypepublicite')}}">Tous les types publicites</a></li>
                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#publicite" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Publicite</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="publicite">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_publicite')}}">Nouveau</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.listepublicite')}}">Tous les publicites</a></li>
                    </ul>
                    </div>
                </li>



                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#type_article" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Type article</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="type_article">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_typearticle')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listetypearticle')}}">Tous les types article</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#article" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Article</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="article">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_article')}}">Nouveau</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listearticle')}}">Tous les articles</a></li>

                    </ul>
                    </div>
                </li>


                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#actualite" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Actualite</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="actualite">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_actualite')}}">Créer les actualités</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeactualite')}}">Liste des actualités</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#agence" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion agence</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="agence">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_agence')}}">Créer les agences</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeagence')}}">Liste des agences</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#hotel" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion hotel</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="hotel">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_hotel')}}">Créer les hotels</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listehotel')}}">Liste des hotels</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#bar_resto" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion bar & resto</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="bar_resto">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_BarResto')}}">Création de bar & resto</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeBarResto')}}">Liste des bar & resto</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#site_touristique" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion site</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="site_touristique">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Site')}}">Création des sites</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeSite')}}">Liste des sites</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#centre_sante" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion centre sante</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="centre_sante">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_CentreSante')}}">Créer les centre de sante</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeCentreSante')}}">Liste des centre de sante</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#gym" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion gym</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="gym">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Gym')}}">Créer les gyms</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeGym')}}">Liste des gyms</a></li>

                    </ul>
                    </div>
                </li>


                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#guichet_automatique" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion guichet</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="guichet_automatique">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Guichet')}}">Créer les guichets</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeGuichet')}}">Liste des guichets</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#station" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion station</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="station">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Station')}}">Créer les stations</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeStation')}}">Liste des stations</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#marche" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion marché</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="marche">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Marche')}}">Créer les marchés</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeMarche')}}">Liste des marchés</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#boite_nuit" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion boite de nuit</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="boite_nuit">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_BoiteNuit')}}">Créer les boites nuit</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeBoiteNuit')}}">Liste des boites nuit</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#frequence_radio" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion fréquence radio</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="frequence_radio">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_FrequenceRadio')}}">Créer les radios</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeFrequenceRadio')}}">Liste des radios</a></li>

                    </ul>
                    </div>
                </li>


                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#lieu_religieu" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion réligion</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="lieu_religieu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_LieuReligieu')}}">Créer les réligions</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeLieuReligieu')}}">Liste des réligions</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#pharmacie" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion pharmacie</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="pharmacie">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_Pharmacie')}}">Création de pharmacie</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listePharmacie')}}">Liste des pharmacie</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#programme_evenement" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion programme evenement</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="programme_evenement">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_programme')}}">Créer les programmes</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeprogramme')}}">Liste des programmes</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#programme_evala" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion programme evala</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="programme_evala">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_ProgrammeEvela')}}">Créer les programmes</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listerProgrammeEvala')}}">Liste des programmes</a></li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#type_evenement" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Gestion type évènement</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="type_evenement">
                        <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_TypeEvenement')}}">Créer type évènement</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeTypeEvenement')}}">liste type évènement</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#evenement" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Gestion évènement</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="evenement">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.creer_evenement')}}">Créer évènement</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.listeEvenement')}}">liste évènement</a></li>
                    </ul>
                    </div>
                </li>

                @endif


          </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_navbar.html -->
          <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
              </button>
              <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                  <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input type="text" class="form-control" placeholder="Search products">
                  </form>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown d-none d-lg-block">

                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                    <h6 class="p-3 mb-0">Projects</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-file-outline text-primary"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Software Development</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-web text-info"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">UI Development</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-layers text-danger"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Software Testing</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">See all projects</p>
                  </div>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                  <a class="nav-link" href="#">
                    <i class="mdi mdi-view-grid"></i>
                  </a>
                </li>
                <li class="nav-item dropdown border-left">
                  <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email"></i>
                    <span class="count bg-success"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                        <p class="text-muted mb-0"> 1 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                        <p class="text-muted mb-0"> 15 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                        <p class="text-muted mb-0"> 18 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">4 new messages</p>
                  </div>
                </li>
                <li class="nav-item dropdown border-left">
                  <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell"></i>
                    <span class="count bg-danger"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-calendar text-success"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Event today</p>
                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-settings text-danger"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Settings</p>
                        <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-link-variant text-warning"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Launch Admin</p>
                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">See all notifications</p>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                      <img class="img-xs rounded-circle" src="{{asset('assets/images/admin_logo.png')}}" alt="">
                      <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::guard('admin')->user()->admin_nom}}</p>
                      <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Profile</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-settings text-success"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Réglage</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">{{ __('Se déconnecter') }}</p>
                            </div>
                        </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="post" class="d-none">
                                @csrf
                            </form>

                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">Réglages avancés</p>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
              </button>
            </div>
          </nav>
          <!-- partial -->
          <div class="main-panel">


            <main>
                @yield('content')
            </main>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © mekengroup.com 2022</span>

              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- partial -->
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>
</body>
</html>
