<?php

namespace App\Http\Controllers;

use App\Models\type_article;
use Illuminate\Http\Request;

class TypeArticleController extends Controller
{
    //
    public function index(){
        $type_articles = type_article::all();
        return response()->json($type_articles);
    }

    public function store(Request $request){

        $type_article = new type_article();
        $type_article->libelle_type_article  = $request->libelle_type_article;
        $type_article->description_type_article  = $request->description_type_article;
        $save= $type_article->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $type_article = type_article::find($id);
        if (is_null($type_article)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($type_article);
    }

    public function destroy($type_article){
        $type_article= type_article::find($type_article);
        $valider = $type_article->delete();
        if($valider){
            return response()->json(['message'=>'type_article est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}

