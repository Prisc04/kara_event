<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CantonController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\LigneCommandeController;
use App\Http\Controllers\LutteurController;
use App\Http\Controllers\PrefectureController;
use App\Http\Controllers\PubController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\TypeArticleController;
use App\Http\Controllers\TypeEvenemantController;
use App\Http\Controllers\TypePubliciteController;
use App\Http\Controllers\TypeSocieteController;
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
Route::get('admins',[AdminController::class,'index']);
Route::post('/logout',[AuthController::class,'logout']);
});


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


Route::get('site_touristique',[SiteController::class,'index']);
Route::post('site_touristique',[SiteController::class,'store']);
Route::get('site_touristique/{id}',[SiteController::class,'show']);
Route::delete('site_touristique/{id}',[SiteController::class,'destroy']);
//Route::put('site_touristique/{id}',[SiteController::class,'update']);

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
//Route::put('type_societe/{id}',[SocieteController::class,'update']);

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



