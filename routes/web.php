<?php

use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgenceController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BarRestoController;
use App\Http\Controllers\Admin\BoiteNuitController;
use App\Http\Controllers\Admin\CantonControlleur;
use App\Http\Controllers\Admin\CentreSanteController;
use App\Http\Controllers\Admin\EvenementController;
use App\Http\Controllers\Admin\FrequenceRadioController;
use App\Http\Controllers\Admin\GuichetController;
use App\Http\Controllers\Admin\GymController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LieuReligieuController;
use App\Http\Controllers\Admin\LutteurController;
use App\Http\Controllers\Admin\MarcheController;
use App\Http\Controllers\Admin\PharmacieController;
use App\Http\Controllers\Admin\ProgrammeEvalaController;
use App\Http\Controllers\Admin\ProgrammeEvenementController;
use App\Http\Controllers\Admin\PubController;
use App\Http\Controllers\Admin\ScoreController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\SocieteController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\TypeArticleController;
use App\Http\Controllers\Admin\TypeEvenementController;
use App\Http\Controllers\Admin\TypePubliciteController;
use App\Http\Controllers\Admin\TypeSocieteController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin
    Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin', ])->group(function(){
    Route::view('/admin_connexion_login','interface_admin.login')->name('login');
    // Route::view('/admin_register','interface_admin.register2')->name('register');
    //Route::post('/create',[AdminController::class,'create'])->name('create');
    Route::post('/check', [AdminController::class,'check'])->name('check');

    });

        Route::middleware(['auth:admin', ])->group(function(){
        Route::get('/home', [AdminController::class,'hom'])->name('home');
        Route::view('/admin_register','interface_admin.register')->name('register');
        Route::post('/create',[AdminController::class,'create'])->name('create');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/admin_affiche', [AdminController::class, 'liste'])->name('liste');
        Route::get('/supprimer_admin/{id}', [AdminController::class, 'destroy'])->name('supprimer_admin');
        Route::get('/activer_admin/{id}', [AdminController::class,'activer_admin'])->name('activer_admin');
        Route::get('/desactiver_admin/{id}', [AdminController::class,'desactiver_admin'])->name('desactiver_admin');


        //canton
        Route::get('/creercanton', [CantonControlleur::class,'create'])->name('creercanton');
        Route::post('/ajoutercanton', [CantonControlleur::class, 'store'])->name('store_canton');
        Route::get('/admin_listecanton', [CantonControlleur::class, 'index'])->name('listecanton');
        Route::get('/cantonOne/{id}', [CantonControlleur::class, 'edit'])->name('cantonOne');
        Route::put('/updateCanton/{id}', [CantonControlleur::class, 'update'])->name('updateCanton');
        Route::get('/supprimer_canton/{id}', [CantonControlleur::class,'destroy'])->name('supprimer_canton');
        Route::get('/activer_canton/{id}', [CantonControlleur::class,'activer_canton'])->name('activer_canton');
        Route::get('/desactiver_canton/{id}', [CantonControlleur::class,'desactiver_canton'])->name('desactiver_canton');

        //type societe
        Route::get('/creerTypeSociete', [TypeSocieteController::class, 'create'])->name('creer_typesociete');
        Route::post('/ajoutertypesociete', [TypeSocieteController::class, 'store'])->name('store_typesociete');
        Route::get('/admin_listeTypeSociete', [TypeSocieteController::class, 'index'])->name('listetypesociete');
        Route::get('/TypeSocieteOne/{id}', [TypeSocieteController::class, 'edit'])->name('typesocieteOne');
        Route::put('/updateTypeSociete/{id}', [TypeSocieteController::class, 'update'])->name('updatetypesociete');
        Route::get('/supprimer_TypeSociete/{id}', [TypeSocieteController::class,'destroy'])->name('supprimer_typesociete');
        Route::get('/activer_TypeSociete/{id}', [TypeSocieteController::class,'activer_typesociete'])->name('activer_typesociete');
        Route::get('/desactiver_TypeSociete/{id}', [TypeSocieteController::class,'desactiver_typesociete'])->name('desactiver_typesociete');

        //societe
        Route::get('/creersociete', [SocieteController::class, 'create'])->name('creer_societe');
        Route::post('/ajoutersociete', [SocieteController::class, 'store'])->name('store_societe');
        Route::get('/admin_listesociete', [SocieteController::class, 'index'])->name('listesociete');
        Route::get('/societeOne/{id}', [SocieteController::class, 'edit'])->name('societeOne');
        Route::put('/updateSociete/{id}', [SocieteController::class, 'update'])->name('updateSociete');
        Route::get('/supprimer_societe/{id}', [SocieteController::class,'destroy'])->name('supprimer_societe');
        Route::get('/activer_societe/{id}', [SocieteController::class,'activer_societe'])->name('activer_societe');
        Route::get('/desactiver_societe/{id}', [SocieteController::class,'desactiver_societe'])->name('desactiver_societe');

        //lutteur
        Route::get('/creerlutteur', [LutteurController::class, 'create'])->name('creer_lutteur');
        Route::post('/ajouterlutteur', [LutteurController::class, 'store'])->name('store_lutteur');
        Route::get('/admin_listelutteur', [LutteurController::class, 'index'])->name('listelutteur');
        Route::get('/lutteurOne/{id}', [LutteurController::class, 'edit'])->name('lutteurOne');
        Route::put('/updateLutteur/{id}', [LutteurController::class, 'update'])->name('updateLutteur');
        Route::get('/supprimer_lutteur/{id}', [LutteurController::class,'destroy'])->name('supprimer_lutteur');
        Route::get('/activer_lutteur/{id}', [LutteurController::class,'activer_lutteur'])->name('activer_lutteur');
        Route::get('/desactiver_lutteur/{id}', [LutteurController::class,'desactiver_lutteur'])->name('desactiver_lutteur');


        //Evenement
        Route::get('/creerEvenement', [EvenementController::class, 'create'])->name('creer_evenement');
        Route::post('/ajouterEvenement', [EvenementController::class, 'store'])->name('store_evenement');
        Route::get('/admin_listeEvenement', [EvenementController::class, 'index'])->name('listeEvenement');
        Route::get('/evenementOne/{id}', [EvenementController::class, 'edit'])->name('evenementOne');
        Route::put('/updateEvenement/{id}', [EvenementController::class, 'update'])->name('updateEvenement');
        Route::get('/supprimer_evenement/{id}', [EvenementController::class,'destroy'])->name('supprimer_evenement');
        Route::get('/activer_evenement/{id}', [EvenementController::class,'activer_evenement'])->name('activer_evenement');
        Route::get('/desactiver_evenement/{id}', [EvenementController::class,'desactiver_evenement'])->name('desactiver_evenement');

         // Type Evenement
         Route::get('/creerTypeEvenement', [TypeEvenementController::class, 'create'])->name('creer_TypeEvenement');
         Route::post('/ajoutertypeEvenement', [TypeEvenementController::class, 'store'])->name('store_TypeEvenement');
         Route::get('/admin_listeTypeEvenement', [TypeEvenementController::class, 'index'])->name('listeTypeEvenement');
         Route::get('/TypeEvenementOne/{id}', [TypeEvenementController::class, 'edit'])->name('TypeEvenementOne');
         Route::put('/updateTypeEvenement/{id}', [TypeEvenementController::class, 'update'])->name('update_TypeEvenement');
         Route::get('/supprimer_TypeEvenement/{id}', [TypeEvenementController::class,'destroy'])->name('supprimer_TypeEvenement');
         Route::get('/activer_TypeEvenement/{id}', [TypeEvenementController::class,'activer_TypeEvenement'])->name('activer_TypeEvenement');
         Route::get('/desactiver_TypeEvenement/{id}', [TypeEvenementController::class,'desactiver_TypeEvenement'])->name('desactiver_TypeEvenement');



        //type article
        Route::get('/creerTypeArticle', [TypeArticleController::class, 'create'])->name('creer_typearticle');
        Route::post('/ajoutertypearticle', [TypeArticleController::class, 'store'])->name('store_typearticle');
        Route::get('/admin_listetypearticle', [TypeArticleController::class, 'index'])->name('listetypearticle');
        Route::get('/typearticleOne/{id}', [TypeArticleController::class, 'edit'])->name('typearticleOne');
        Route::put('/updatetypearticle/{id}', [TypeArticleController::class, 'update'])->name('updatetypearticle');
        Route::get('/supprimer_typearticle/{id}', [TypeArticleController::class,'destroy'])->name('supprimer_typearticle');
        Route::get('/activer_typearticle/{id}', [TypeArticleController::class,'activer_typearticle'])->name('activer_typearticle');
        Route::get('/desactiver_typearticle/{id}', [TypeArticleController::class,'desactiver_typearticle'])->name('desactiver_typearticle');

         //article
         Route::get('/creerarticle', [ArticleController::class, 'create'])->name('creer_article');
         Route::post('/ajouterarticle', [ArticleController::class, 'store'])->name('store_article');
         Route::get('/admin_listearticle', [ArticleController::class, 'index'])->name('listearticle');
         Route::get('/articleOne/{id}', [ArticleController::class, 'edit'])->name('articleOne');
         Route::put('/updatearticle/{id}', [ArticleController::class, 'update'])->name('updatearticle');
         Route::get('/supprimer_article/{id}', [ArticleController::class,'destroy'])->name('supprimer_article');
         Route::get('/activer_article/{id}', [ArticleController::class,'activer_article'])->name('activer_article');
         Route::get('/desactiver_article/{id}', [ArticleController::class,'desactiver_article'])->name('desactiver_article');

          //agence
          Route::get('/creeragence', [AgenceController::class, 'create'])->name('creer_agence');
          Route::post('/ajouteragence', [AgenceController::class, 'store'])->name('store_agence');
          Route::get('/admin_listeagence', [AgenceController::class, 'index'])->name('listeagence');
          Route::get('/agenceOne/{id}', [AgenceController::class, 'edit'])->name('agenceOne');
          Route::put('/agencearticle/{id}', [AgenceController::class, 'update'])->name('updateagence');
          Route::get('/supprimer_agence/{id}', [AgenceController::class,'destroy'])->name('supprimer_agence');
          Route::get('/activer_agence/{id}', [AgenceController::class,'activer_agence'])->name('activer_agence');
          Route::get('/desactiver_agence/{id}', [AgenceController::class,'desactiver_agence'])->name('desactiver_agence');

          //type publicite
        Route::get('/creerTypePublicite', [TypePubliciteController::class, 'create'])->name('creer_typepublicite');
        Route::post('/ajoutertypepublicite', [TypePubliciteController::class, 'store'])->name('store_typepublicite');
        Route::get('/admin_listeTypepublicite', [TypePubliciteController::class, 'index'])->name('listetypepublicite');
        Route::get('/TypePubliciteOne/{id}', [TypePubliciteController::class, 'edit'])->name('typepubliciteOne');
        Route::put('/updateTypePublicite/{id}', [TypePubliciteController::class, 'update'])->name('updatetypepublicite');
        Route::get('/supprimer_TypePublicite/{id}', [TypePubliciteController::class,'destroy'])->name('supprimer_typepublicite');
        Route::get('/activer_TypePublicite/{id}', [TypePubliciteController::class,'activer_typepublicite'])->name('activer_typepublicite');
        Route::get('/desactiver_TypePublicite/{id}', [TypePubliciteController::class,'desactiver_typepublicite'])->name('desactiver_typepublicite');

         //Pub
        Route::get('/creerPublicite', [PubController::class, 'create'])->name('creer_publicite');
        Route::post('/ajouterpublicite', [PubController::class, 'store'])->name('store_publicite');
        Route::get('/admin_listepublicite', [PubController::class, 'index'])->name('listepublicite');
        Route::get('/PubliciteOne/{id}', [PubController::class, 'edit'])->name('publiciteOne');
        Route::put('/updatePublicite/{id}', [PubController::class, 'update'])->name('updatepublicite');
        Route::get('/supprimer_Publicite/{id}', [PubController::class,'destroy'])->name('supprimer_publicite');
        Route::get('/activer_Publicite/{id}', [PubController::class,'activer_publicite'])->name('activer_publicite');
        Route::get('/desactiver_Publicite/{id}', [PubController::class,'desactiver_publicite'])->name('desactiver_publicite');

        // Actualite
        Route::get('/creerActualite', [ActualiteController::class, 'create'])->name('creer_actualite');
        Route::post('/ajouteractualite', [ActualiteController::class, 'store'])->name('store_actualite');
        Route::get('/admin_listeactualite', [ActualiteController::class, 'index'])->name('listeactualite');
        Route::get('/ActualiteOne/{id}', [ActualiteController::class, 'edit'])->name('actualiteOne');
        Route::put('/updateActualite/{id}', [ActualiteController::class, 'update'])->name('updateActualite');
        Route::get('/supprimer_actualite/{id}', [ActualiteController::class,'destroy'])->name('supprimer_actualite');
        Route::get('/activer_actualite/{id}', [ActualiteController::class,'activer_actualite'])->name('activer_actualite');
        Route::get('/desactiver_actualite/{id}', [ActualiteController::class,'desactiver_actualite'])->name('desactiver_actualite');

        // Programme evenement
        Route::get('/creerProgramme', [ProgrammeEvenementController::class, 'create'])->name('creer_programme');
        Route::post('/ajouterProgramme', [ProgrammeEvenementController::class, 'store'])->name('store_programme');
        Route::get('/admin_listeProgramme', [ProgrammeEvenementController::class, 'index'])->name('listeprogramme');
        Route::get('/ProgrammeOne/{id}', [ProgrammeEvenementController::class, 'edit'])->name('programmeOne');
        Route::put('/updateProgramme/{id}', [ProgrammeEvenementController::class, 'update'])->name('updateprogramme');
        Route::get('/supprimer_Programme/{id}', [ProgrammeEvenementController::class,'destroy'])->name('supprimer_programme');
        Route::get('/activer_Programme/{id}', [ProgrammeEvenementController::class,'activer_programme'])->name('activer_programme');
        Route::get('/desactiver_Programme/{id}', [ProgrammeEvenementController::class,'desactiver_programme'])->name('desactiver_programme');

         // hotel
         Route::get('/creerHotel', [HotelController::class, 'create'])->name('creer_hotel');
         Route::post('/ajouterHotel', [HotelController::class, 'store'])->name('store_hotel');
         Route::get('/admin_listeHotel', [HotelController::class, 'index'])->name('listehotel');
         Route::get('/HotelOne/{id}', [HotelController::class, 'edit'])->name('hotelOne');
         Route::put('/updateHotel/{id}', [HotelController::class, 'update'])->name('updatehotel');
         Route::get('/supprimer_Hotel/{id}', [HotelController::class,'destroy'])->name('supprimer_hotel');
         Route::get('/activer_Hotel/{id}', [HotelController::class,'activer_hotel'])->name('activer_hotel');
         Route::get('/desactiver_Hotel/{id}', [HotelController::class,'desactiver_hotel'])->name('desactiver_hotel');


        // Bar&Resto
        Route::get('/creerBarResto',[BarRestoController::class,'create'])->name('creer_BarResto');
        Route::post('/ajouterBarResto', [BarRestoController::class, 'store'])->name('store_BarResto');
        Route::get('/admin_BarResto', [BarRestoController::class, 'index'])->name('listeBarResto');
        Route::get('/BarRestoOne/{id}', [BarRestoController::class, 'edit'])->name('BarRestoOne');
        Route::put('/updateBarResto/{id}', [BarRestoController::class, 'update'])->name('updateBarResto');
        Route::get('/supprimer_BarResto/{id}', [BarRestoController::class,'destroy'])->name('supprimer_BarResto');
        Route::get('/activer_BarResto/{id}', [BarRestoController::class,'activer_BarResto'])->name('activer_BarResto');
        Route::get('/desactiver_BarResto/{id}', [BarRestoController::class,'desactiver_BarResto'])->name('desactiver_BarResto');

        // Pharmacie
        Route::get('/creerPharmacie',[PharmacieController::class,'create'])->name('creer_Pharmacie');
        Route::post('/ajouterpharmacie', [PharmacieController::class, 'store'])->name('store_Pharmacie');
        Route::get('/admin_Pharmacie', [PharmacieController::class, 'index'])->name('listePharmacie');
        Route::get('/PharmacieOne/{id}', [PharmacieController::class, 'edit'])->name('PharmacieOne');
        Route::put('/updatePharmacie/{id}', [PharmacieController::class, 'update'])->name('updatePharmacie');
        Route::get('/supprimer_Pharmacie/{id}', [PharmacieController::class,'destroy'])->name('supprimer_Pharmacie');
        Route::get('/activer_Pharmacie/{id}', [PharmacieController::class,'activer_Pharmacie'])->name('activer_Pharmacie');
        Route::get('/desactiver_Pharmacie/{id}', [PharmacieController::class,'desactiver_Pharmacie'])->name('desactiver_Pharmacie');

        //score
        Route::get('/creerScore',[ScoreController::class,'create'])->name('creer_Score');
        Route::post('/ajouterScore', [ScoreController::class,'store'])->name('store_Score');
        Route::get('/admin_Score', [ScoreController::class, 'index'])->name('listeScore');
        Route::get('/ScoreOne/{id}', [ScoreController::class, 'edit'])->name('ScoreOne');
        Route::put('/updateScore/{id}', [ScoreController::class, 'update'])->name('updateScore');
        Route::get('/supprimer_Score/{id}', [ScoreController::class,'destroy'])->name('supprimer_Score');
        Route::get('/activer_Score/{id}', [ScoreController::class,'activer_score'])->name('activer_Score');
        Route::get('/desactiver_Score/{id}', [ScoreController::class,'desactiver_score'])->name('desactiver_Score');

         // Programme evala
         Route::get('/creerProgrammeEvala', [ProgrammeEvalaController::class, 'create'])->name('creer_ProgrammeEvela');
         Route::post('/ajouterProgrammeEvala', [ProgrammeEvalaController::class, 'store'])->name('store_ProgrammeEvela');
         Route::get('/admin_listerProgrammeEvala', [ProgrammeEvalaController::class, 'index'])->name('listerProgrammeEvala');
         Route::get('/ProgrammeEvalaOne/{id}', [ProgrammeEvalaController::class, 'edit'])->name('ProgrammeEvelaOne');
         Route::put('/updateProgrammeEvala/{id}', [ProgrammeEvalaController::class, 'update'])->name('updateProgrammeEvela');
         Route::get('/supprimer_ProgrammeEvala/{id}', [ProgrammeEvalaController::class,'destroy'])->name('supprimer_ProgrammeEvela');
         Route::get('/activer_ProgrammeEvala/{id}', [ProgrammeEvalaController::class,'activer_ProgrammeEvala'])->name('activer_ProgrammeEvala');
         Route::get('/desactiver_ProgrammeEvala/{id}', [ProgrammeEvalaController::class,'desactiver_ProgrammeEvala'])->name('desactiver_ProgrammeEvala');

          // Site
          Route::get('/creerSite', [SiteController::class, 'create'])->name('creer_Site');
          Route::post('/ajouterSite', [SiteController::class, 'store'])->name('store_Site');
          Route::get('/admin_listerSite', [SiteController::class, 'index'])->name('listeSite');
          Route::get('/SiteOne/{id}', [SiteController::class, 'edit'])->name('SiteOne');
          Route::put('/updateSite/{id}', [SiteController::class, 'update'])->name('updateSite');
          Route::get('/supprimer_Site/{id}', [SiteController::class,'destroy'])->name('supprimer_Site');
          Route::get('/activer_Site/{id}', [SiteController::class,'activer_Site'])->name('activer_Site');
          Route::get('/desactiver_Site/{id}', [SiteController::class,'desactiver_site'])->name('desactiver_Site');

          // Centre sante
          Route::get('/creerCentreSante', [CentreSanteController::class, 'create'])->name('creer_CentreSante');
          Route::post('/ajouterCentreSante', [CentreSanteController::class, 'store'])->name('store_CentreSante');
          Route::get('/admin_listerCentreSante', [CentreSanteController::class, 'index'])->name('listeCentreSante');
          Route::get('/CentreSanteOne/{id}', [CentreSanteController::class, 'edit'])->name('CentreSanteOne');
          Route::put('/updateCentreSante/{id}', [CentreSanteController::class, 'update'])->name('updateCentreSante');
          Route::get('/supprimer_CentreSante/{id}', [CentreSanteController::class,'destroy'])->name('supprimer_CentreSante');
          Route::get('/activer_CentreSante/{id}', [CentreSanteController::class,'activer_CentreSante'])->name('activer_CentreSante');
          Route::get('/desactiver_CentreSante/{id}', [CentreSanteController::class,'desactiver_CentreSante'])->name('desactiver_CentreSante');

          // Guichet automatique
          Route::get('/creerGuichet', [GuichetController::class, 'create'])->name('creer_Guichet');
          Route::post('/ajouterGuichet', [GuichetController::class, 'store'])->name('store_Guichet');
          Route::get('/admin_listeGuichet', [GuichetController::class, 'index'])->name('listeGuichet');
          Route::get('/GuichetOne/{id}', [GuichetController::class, 'edit'])->name('GuichetOne');
          Route::put('/updateGuichet/{id}', [GuichetController::class, 'update'])->name('updateGuichet');
          Route::get('/supprimer_Guichet/{id}', [GuichetController::class,'destroy'])->name('supprimer_Guichet');
          Route::get('/activer_Guichet/{id}', [GuichetController::class,'activer_Guichet'])->name('activer_Guichet');
          Route::get('/desactiver_Guichet/{id}', [GuichetController::class,'desactiver_Guichet'])->name('desactiver_Guichet');

          // station
          Route::get('/creerStation', [StationController::class, 'create'])->name('creer_Station');
          Route::post('/ajouterStation', [StationController::class, 'store'])->name('store_Station');
          Route::get('/admin_listeStation', [StationController::class, 'index'])->name('listeStation');
          Route::get('/StationOne/{id}', [StationController::class, 'edit'])->name('StationOne');
          Route::put('/updateStation/{id}', [StationController::class, 'update'])->name('updateStation');
          Route::get('/supprimer_Station/{id}', [StationController::class,'destroy'])->name('supprimer_Station');
          Route::get('/activer_Station/{id}', [StationController::class,'activer_Station'])->name('activer_Station');
          Route::get('/desactiver_Station/{id}', [StationController::class,'desactiver_Station'])->name('desactiver_Station');

          // Lieu religieu
          Route::get('/creerLieuReligieu', [LieuReligieuController::class, 'create'])->name('creer_LieuReligieu');
          Route::post('/ajouterLieuReligieu', [LieuReligieuController::class, 'store'])->name('store_LieuReligieu');
          Route::get('/admin_LieuReligieu', [LieuReligieuController::class, 'index'])->name('listeLieuReligieu');
          Route::get('/LieuReligieuOne/{id}', [LieuReligieuController::class, 'edit'])->name('LieuReligieuOne');
          Route::put('/updateLieuReligieu/{id}', [LieuReligieuController::class, 'update'])->name('updateLieuReligieu');
          Route::get('/supprimer_LieuReligieu/{id}', [LieuReligieuController::class,'destroy'])->name('supprimer_LieuReligieu');
          Route::get('/activer_LieuReligieu/{id}', [LieuReligieuController::class,'activer_LieuReligieu'])->name('activer_LieuReligieu');
          Route::get('/desactiver_LieuReligieu/{id}', [LieuReligieuController::class,'desactiver_LieuReligieu'])->name('desactiver_LieuReligieu');

          // Marche
          Route::get('/creerMarche', [MarcheController::class, 'create'])->name('creer_Marche');
          Route::post('/ajouterMarche', [MarcheController::class, 'store'])->name('store_Marche');
          Route::get('/admin_Marche', [MarcheController::class, 'index'])->name('listeMarche');
          Route::get('/MarcheOne/{id}', [MarcheController::class, 'edit'])->name('MarcheOne');
          Route::put('/updateMarche/{id}', [MarcheController::class, 'update'])->name('updateMarche');
          Route::get('/supprimer_Marche/{id}', [MarcheController::class,'destroy'])->name('supprimer_Marche');
          Route::get('/activer_Marche/{id}', [MarcheController::class,'activer_Marche'])->name('activer_Marche');
          Route::get('/desactiver_Marche/{id}', [MarcheController::class,'desactiver_Marche'])->name('desactiver_Marche');

          // Fréquence radio
          Route::get('/creerFrequenceRadio', [FrequenceRadioController::class, 'create'])->name('creer_FrequenceRadio');
          Route::post('/ajouterFrequenceRadio', [FrequenceRadioController::class, 'store'])->name('store_FrequenceRadio');
          Route::get('/admin_FrequenceRadio', [FrequenceRadioController::class, 'index'])->name('listeFrequenceRadio');
          Route::get('/FrequenceRadioOne/{id}', [FrequenceRadioController::class, 'edit'])->name('FrequenceRadioOne');
          Route::put('/updateFrequenceRadio/{id}', [FrequenceRadioController::class, 'update'])->name('updateFrequenceRadio');
          Route::get('/supprimer_FrequenceRadio/{id}', [FrequenceRadioController::class,'destroy'])->name('supprimer_FrequenceRadio');
          Route::get('/activer_FrequenceRadio/{id}', [FrequenceRadioController::class,'activer_FrequenceRadio'])->name('activer_FrequenceRadio');
          Route::get('/desactiver_FrequenceRadio/{id}', [FrequenceRadioController::class,'desactiver_FrequenceRadio'])->name('desactiver_FrequenceRadio');

          // Boite Nuit
          Route::get('/creerBoiteNuit', [BoiteNuitController::class, 'create'])->name('creer_BoiteNuit');
          Route::post('/ajouterBoiteNuit', [BoiteNuitController::class, 'store'])->name('store_BoiteNuit');
          Route::get('/admin_BoiteNuit', [BoiteNuitController::class, 'index'])->name('listeBoiteNuit');
          Route::get('/BoiteNuitoOne/{id}', [BoiteNuitController::class, 'edit'])->name('BoiteNuitOne');
          Route::put('/updateBoiteNuit/{id}', [BoiteNuitController::class, 'update'])->name('updateBoiteNuit');
          Route::get('/supprimer_BoiteNuit/{id}', [BoiteNuitController::class,'destroy'])->name('supprimer_BoiteNuit');
          Route::get('/activer_BoiteNuit/{id}', [BoiteNuitController::class,'activer_BoiteNuit'])->name('activer_BoiteNuit');
          Route::get('/desactiver_BoiteNuit/{id}', [BoiteNuitController::class,'activer_BoiteNuit'])->name('desactiver_BoiteNuit');

          // gym
          Route::get('/creerGym', [GymController::class, 'create'])->name('creer_Gym');
          Route::post('/ajouterGym', [GymController::class, 'store'])->name('store_Gym');
          Route::get('/admin_Gym', [GymController::class, 'index'])->name('listeGym');
          Route::get('/GymOne/{id}', [GymController::class, 'edit'])->name('GymOne');
          Route::put('/updateGym/{id}', [GymController::class, 'update'])->name('updateGym');
          Route::get('/supprimer_Gym/{id}', [GymController::class,'destroy'])->name('supprimer_Gym');
          Route::get('/activer_Gym/{id}', [GymController::class,'activer_Gym'])->name('activer_Gym');
          Route::get('/desactiver_Gym/{id}', [GymController::class,'descactiver_Gym'])->name('desactiver_Gym');


    });
});


