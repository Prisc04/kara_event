<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index(){
        $articles = article::all();
        return response()->json($articles);
    }

    public function store(Request $request){

        $article = new article();
        $article->libelle_article  = $request->libelle_article;
        $article->nom_article  = $request->nom_article;
        $article->libelle_article  = $request->libelle_article;
        $article-> description_article = $request->description_article;
        $article->photo_article  = $request->description_type_article;
        $article->prix_article  = $request->prix_article;
        $save= $article->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $article = article::find($id);
        if (is_null($article)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($article);
    }

    public function destroy($article){
        $article= article::find($article);
        $valider = $article->delete();
        if($valider){
            return response()->json(['message'=>'article est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
