<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CantonControlleur;
use App\Http\Controllers\Admin\EvenementController;
use App\Http\Controllers\Admin\LutteurController;
use App\Http\Controllers\admin\SocieteController;
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
    Route::post('/check', [AdminController::class,'check'])->name('check');

    });

         Route::middleware(['auth:admin', ])->group(function(){
        Route::view('/home', 'interface_admin.hom')->name('home');
        Route::view('/admin_register','interface_admin.register')->name('register');
        Route::post('/create',[AdminController::class,'create'])->name('create');


        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/admin_affiche', [AdminController::class, 'liste'])->name('liste');


        //canton
        Route::get('/creercanton', [CantonControlleur::class,'create'])->name('creercanton');
        Route::post('/ajoutercanton', [CantonControlleur::class, 'store'])->name('store_canton');
        Route::get('/admin_listecanton', [CantonControlleur::class, 'index'])->name('listecanton');

        //societe
        Route::get('/creersociete', [SocieteController::class, 'create'])->name('creer_societe');
        Route::post('/ajoutersociete', [SocieteController::class, 'store'])->name('store_societe');
        Route::get('/admin_listesociete', [SocieteController::class, 'index'])->name('listesociete');

        //lutteur
        Route::get('/creerlutteur', [LutteurController::class, 'create'])->name('creer_lutteur');
        Route::post('/ajouterlutteur', [LutteurController::class, 'store'])->name('store_lutteur');
        Route::get('/admin_listelutteur', [LutteurController::class, 'index'])->name('listelutteur');

        //Evenement
        Route::get('/creerEvenement', [EvenementController::class, 'create'])->name('creer_evenement');
        Route::post('/ajouterEvenement', [EvenementController::class, 'store'])->name('store_evenement');
        Route::get('/admin_listeEvenement', [EvenementController::class, 'index'])->name('listeEvenement');

    });
});


