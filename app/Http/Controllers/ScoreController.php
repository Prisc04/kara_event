<?php

namespace App\Http\Controllers;

use App\Models\score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function index(){
        $scores = score::all();
        return response()->json($scores);
    }

    public function store (request $request){
        $score = new score();
        $score->nom_canton1  = $request->nom_canton;
        $score->point_score1  = $request->point_score;
        $score->nom_canton2  = $request->nom_canton;
        $score->point_score2  = $request->point_score;
        $score->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $score = score::find($id);
        if (is_null($score)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($score);
    }

    public function destroy($score){
        $score = score::find($score);
        $valider = $score->delete();
        if($valider){
            return response()->json(['message'=>'score est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
