<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CantonControlleur;
use App\Http\Controllers\Admin\EvenementController;
use App\Http\Controllers\Admin\LutteurController;
use App\Http\Controllers\admin\SocieteController;
use App\Http\Controllers\Admin\TypeArticleController;
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
    Route::view('/admin_register','interface_admin.register2')->name('register');
    Route::post('/create',[AdminController::class,'create'])->name('create');
    Route::post('/check', [AdminController::class,'check'])->name('check');

    });

         Route::middleware(['auth:admin', ])->group(function(){
            Route::get('/home', [AdminController::class,'hom'])->name('home');
            Route::view('/admin_register','interface_admin.register')->name('register');
            Route::post('/create',[AdminController::class,'create'])->name('create');



        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/admin_affiche', [AdminController::class, 'liste'])->name('liste');


        //canton
        Route::get('/creercanton', [CantonControlleur::class,'create'])->name('creercanton');
        Route::post('/ajoutercanton', [CantonControlleur::class, 'store'])->name('store_canton');
        Route::get('/admin_listecanton', [CantonControlleur::class, 'index'])->name('listecanton');
        Route::get('/cantonOne/{id}', [CantonControlleur::class, 'edit'])->name('cantonOne');
        Route::put('/updateCanton/{id}', [CantonControlleur::class, 'update'])->name('updateCanton');
        Route::get('/supprimer_canton/{id}', [CantonControlleur::class,'destroy'])->name('supprimer_canton');
        Route::get('/activer_canton/{id}', [CantonControlleur::class,'activer_canton'])->name('activer_canton');
        Route::get('/desactiver_canton/{id}', [CantonControlleur::class,'desactiver_canton'])->name('desactiver_canton');

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

        //type societe

        Route::get('/creerTypeSociete', [TypeSocieteController::class, 'create'])->name('creer_typesociete');
        Route::post('/ajoutertypesociete', [TypeSocieteController::class, 'store'])->name('store_typesociete');
        Route::get('/admin_listeTypeSociete', [TypeSocieteController::class, 'index'])->name('listetypesociete');
        Route::get('/TypeSocieteOne/{id}', [TypeSocieteController::class, 'edit'])->name('typesocieteOne');
        Route::put('/updateTypeSociete/{id}', [TypeSocieteController::class, 'update'])->name('updatetypesociete');
        Route::get('/supprimer_TypeSociete/{id}', [TypeSocieteController::class,'destroy'])->name('supprimer_typesociete');
        Route::get('/activer_TypeSociete/{id}', [TypeSocieteController::class,'activer_typesociete'])->name('activer_typesociete');
        Route::get('/desactiver_TypeSociete/{id}', [TypeSocieteController::class,'desactiver_typesociete'])->name('desactiver_typesociete');

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



    });
});


