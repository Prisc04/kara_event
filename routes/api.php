<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BarRestoController;
use App\Http\Controllers\BoiteNuitController;
use App\Http\Controllers\CantonController;
use App\Http\Controllers\CentreSanteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\FrequenceRadioController;
use App\Http\Controllers\GuichetController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LieuReligieuController;
use App\Http\Controllers\LigneCommandeController;
use App\Http\Controllers\LutteurController;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\PrefectureController;
use App\Http\Controllers\ProgrammeEvalaController;
use App\Http\Controllers\ProgrammeEvenementController;
use App\Http\Controllers\PubController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ServieController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TypeArticleController;
use App\Http\Controllers\TypeEvenemantController;
use App\Http\Controllers\TypePubliciteController;
use App\Http\Controllers\TypeSocieteController;
use App\Http\Controllers\TypeStationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']], function () {

Route::post('/logout',[AuthController::class,'logout']);
});
Route::get('admins',[AdminController::class,'index']);

Route::post('admins',[AdminController::class,'store']);
Route::get('admins/{id}',[AdminController::class,'show']);
Route::delete('admins/{id}',[AdminController::class,'destroy']);
//Route::put('admin/{id}',[AdminController::class,'update']);

Route::get('canton',[CantonController::class,'index']);
Route::post('canton',[CantonController::class,'store']);
Route::get('canton/{id}',[CantonController::class,'show']);
Route::delete('canton/{id}',[CantonController::class,'destroy']);
//Route::put('canton/{id}',[CantonController::class,'update']);

Route::get('lutteur',[LutteurController::class,'index']);
Route::post('lutteur',[LutteurController::class,'store']);
Route::get('lutteur/{id}',[LutteurController::class,'show']);
Route::delete('lutteur/{id}',[LutteurController::class,'destroy']);
//Route::put('lutteur/{id}',[LutteurController::class,'update']);

Route::get('societe',[SocieteController::class,'index']);
Route::post('societe',[SocieteController::class,'store']);
Route::get('societe/{id}',[SocieteController::class,'show']);
Route::delete('societe/{id}',[SocieteController::class,'destroy']);
//Route::put('societe/{id}',[SocieteController::class,'update']);

Route::get('article',[ArticleController::class,'index']);
Route::post('article',[ArticleController::class,'store']);
Route::get('article/{id}',[ArticleController::class,'show']);
Route::delete('article/{id}',[ArticleController::class,'destroy']);
//Route::put('article/{id}',[ArticleController::class,'update']);

Route::get('prefecture',[PrefectureController::class,'index']);
Route::post('prefecture',[PrefectureController::class,'store']);
Route::get('prefecture/{id}',[PrefectureController::class,'show']);
Route::delete('prefecture/{id}',[PrefectureController::class,'destroy']);
//Route::put('prefecture/{id}',[PrefectureController::class,'update']);

Route::get('evenement',[EvenementController::class,'index']);
Route::post('evenement',[EvenementController::class,'store']);
Route::get('evenement/{id}',[EvenementController::class,'show']);
Route::delete('evenement/{id}',[EvenementController::class,'destroy']);
//Route::put('evenement/{id}',[EvenementController::class,'update']);

Route::get('type_evenement',[TypeEvenemantController::class,'index']);
Route::post('type_evenement',[TypeEvenemantController::class,'store']);
Route::get('type_evenement/{id}',[TypeEvenemantController::class,'show']);
Route::delete('type_evenement/{id}',[TypeEvenemantController::class,'destroy']);
//Route::put('type_evenement/{id}',[TypeEvenemantController::class,'update']);

Route::get('type_societe',[TypeSocieteController::class,'index']);
Route::post('type_societe',[SocieteController::class,'store']);
Route::get('type_societe/{id}',[SocieteController::class,'show']);
Route::delete('type_societe/{id}',[SocieteController::class,'destroy']);
Route::put('type_societe/{id}',[SocieteController::class,'update']);

Route::get('type_article',[TypeArticleController::class,'index']);
Route::post('type_article',[TypeArticleController::class,'store']);
Route::get('type_article/{id}',[TypeArticleController::class,'show']);
Route::delete('type_article/{id}',[TypeArticleController::class,'destroy']);
//Route::put('type_article/{id}',[ligne_commande::class,'update']);

Route::get('ligne_commande',[LigneCommandeController::class,'index']);
Route::post('ligne_commande',[LigneCommandeController::class,'store']);
Route::get('ligne_commande/{id}',[LigneCommandeController::class,'show']);
Route::delete('ligne_commande/{id}',[LigneCommandeController::class,'destroy']);
//Route::put('ligne_commande/{id}',[LigneCommandeController::class,'update']);

Route::get('type_publicite',[TypePubliciteController::class,'index']);
Route::post('type_publicite',[TypePubliciteController::class,'store']);
Route::get('type_publicite/{id}',[TypePubliciteController::class,'show']);
Route::delete('type_publicite/{id}',[TypePubliciteController::class,'destroy']);
//Route::put('type_publicite/{id}',[TypePubliciteController::class,'update']);

Route::get('pub',[PubController::class,'index']);
Route::post('pub',[PubController::class,'store']);
Route::get('pub/{id}',[PubController::class,'show']);
Route::delete('pub/{id}',[PubController::class,'destroy']);
//Route::put('pub/{id}',[PubControllerr::class,'update']);

Route::get('contact',[ContactController::class,'index']);
Route::post('contact',[ContactController::class,'store']);
Route::get('contact/{id}',[ContactController::class,'show']);
Route::delete('contact/{id}',[ContactController::class,'destroy']);
//Route::put('contact/{id}',[ContactController::class,'update']);

Route::get('actualite',[ActualiteController::class,'index']);
Route::post('actualite',[ActualiteController::class,'store']);
Route::get('actualite/{id}',[ActualiteController::class,'show']);
Route::delete('actualite/{id}',[ActualiteController::class,'destroy']);
//Route::put('actualite/{id}',[ActualiteController::class,'update']);

Route::get('programme_evenement',[ProgrammeEvenementController::class,'index']);
Route::post('programme_evenement',[ProgrammeEvenementController::class,'store']);
Route::get('programme_evenement/{id}',[ProgrammeEvenementController::class,'show']);
Route::delete('programme_evenement/{id}',[ProgrammeEvenementController::class,'destroy']);
//Route::put('programme_evenement/{id}',[ProgrammeEvenementController::class,'update']);

Route::get('hotel',[HotelController::class,'index']);
Route::post('hotel',[HotelController::class,'store']);
Route::get('hotel/{id}',[HotelController::class,'show']);
Route::delete('hotel/{id}',[HotelController::class,'destroy']);
//Route::put('hotel/{id}',[HotelController::class,'update']);


Route::get('bar_resto',[BarRestoController::class,'index']);
Route::post('bar_resto',[BarRestoController::class,'store']);
Route::get('bar_resto/{id}',[BarRestoController::class,'show']);
Route::delete('bar_resto/{id}',[BarRestoController::class,'destroy']);
//Route::put('bar_resto/{id}',[BarRestoController::class,'update']);

Route::get('pharmacie',[PharmacieController::class,'index']);
Route::post('pharmacie',[PharmacieController::class,'store']);
Route::get('pharmacie/{id}',[PharmacieController::class,'show']);
Route::delete('pharmacie/{id}',[PharmacieController::class,'destroy']);
//Route::put('pharmacie/{id}',[PharmacieController::class,'update']);

Route::get('agent',[AgenceController::class,'index']);
Route::post('agent',[AgenceController::class,'store']);
Route::get('agent/{id}',[AgenceController::class,'show']);
Route::delete('agent/{id}',[AgenceController::class,'destroy']);
//Route::put('agent/{id}',[AgenceController::class,'update']);

Route::get('score',[ScoreController::class,'index']);
Route::post('score',[ScoreController::class,'store']);
Route::get('score/{id}',[ScoreController::class,'show']);
Route::delete('score/{id}',[ScoreController::class,'destroy']);
//Route::put('score/{id}',[ScoreController::class,'update']);

Route::get('programme_evala',[ProgrammeEvalaController::class,'index']);
Route::post('programme_evala',[ProgrammeEvalaController::class,'store']);
Route::get('programme_evala/{id}',[ProgrammeEvalaController::class,'show']);
Route::delete('programme_evala/{id}',[ProgrammeEvalaController::class,'destroy']);
//Route::put('programme_evala/{id}',[ProgrammeEvalaController::class,'update']);

Route::get('site_touristique',[SiteController::class,'index']);
Route::post('site_touristique',[SiteController::class,'store']);
Route::get('site_touristique/{id}',[SiteController::class,'show']);
Route::delete('site_touristique/{id}',[SiteController::class,'destroy']);
//Route::put('site_touristique/{id}',[SiteController::class,'update']);

Route::get('centre_sante',[CentreSanteController::class,'index']);
Route::post('centre_sante',[CentreSanteController::class,'store']);
Route::get('centre_sante/{id}',[CentreSanteController::class,'show']);
Route::delete('centre_sante/{id}',[CentreSanteController::class,'destroy']);
//Route::put('centre_sante/{id}',[CentreSanteController::class,'update']);

Route::get('guichet_automatique',[GuichetController::class,'index']);
Route::post('guichet_automatique',[GuichetController::class,'store']);
Route::get('guichet_automatique/{id}',[GuichetController::class,'show']);
Route::delete('guichet_automatique/{id}',[GuichetController::class,'destroy']);
//Route::put('guichet_automatique/{id}',[GuichetController::class,'update']);

Route::get('station',[StationController::class,'index']);
Route::post('station',[StationController::class,'store']);
Route::get('station/{id}',[StationController::class,'show']);
Route::delete('station/{id}',[StationController::class,'destroy']);
//Route::put('station/{id}',[StationController::class,'update']);

Route::get('lieu_religieu',[LieuReligieuController::class,'index']);
Route::post('lieu_religieu',[LieuReligieuController::class,'store']);
Route::get('lieu_religieu/{id}',[LieuReligieuController::class,'show']);
Route::delete('lieu_religieu/{id}',[LieuReligieuController::class,'destroy']);
//Route::put('lieu_religieu/{id}',[LieuReligieuController::class,'update']);

Route::get('marche',[MarcheController::class,'index']);
Route::post('marche',[MarcheController::class,'store']);
Route::get('marche/{id}',[MarcheController::class,'show']);
Route::delete('marche/{id}',[MarcheController::class,'destroy']);
//Route::put('marche/{id}',[MarcheController::class,'update']);

Route::get('gym',[GymController::class,'index']);
Route::post('gym',[GymController::class,'store']);
Route::get('gym/{id}',[GymController::class,'show']);
Route::delete('gym/{id}',[GymController::class,'destroy']);
//Route::put('gym/{id}',[GymController::class,'update']);

Route::get('frequence_radio',[FrequenceRadioController::class,'index']);
Route::post('frequence_radio',[FrequenceRadioController::class,'store']);
Route::get('frequence_radio/{id}',[FrequenceRadioController::class,'show']);
Route::delete('frequence_radio/{id}',[FrequenceRadioController::class,'destroy']);
//Route::put('frequence_radio/{id}',[FrequenceRadioController::class,'update']);

Route::get('boite_nuit',[BoiteNuitController::class,'index']);
Route::post('boite_nuit',[BoiteNuitController::class,'store']);
Route::get('boite_nuit/{id}',[BoiteNuitController::class,'show']);
Route::delete('boite_nuit/{id}',[BoiteNuitController::class,'destroy']);
//Route::put('boite_nuit/{id}',[BoiteNuitController::class,'update']);

Route::get('service',[ServieController::class,'index']);
Route::post('service',[ServieController::class,'store']);
Route::get('service/{id}',[ServieController::class,'show']);
Route::delete('service/{id}',[ServieController::class,'destroy']);
Route::put('service/{id}',[ServieController::class,'update']);

Route::get('type-station',[TypeStationController::class,'index']);
Route::post('type-station',[TypeStationController::class,'store']);
Route::get('type-station/{id}',[TypeStationController::class,'show']);
Route::delete('type-station/{id}',[TypeStationController::class,'destroy']);
Route::put('type-station/{id}',[TypeStationController::class,'update']);
Route::get('type-station/{id}',[TypeStationController::class,'activerTypeStation']);
Route::get('type-station/{id}',[TypeStationController::class,'desactiverTypeStation']);







