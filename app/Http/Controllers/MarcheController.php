<?php

namespace App\Http\Controllers;

use App\Models\marche;
use Illuminate\Http\Request;

class MarcheController extends Controller
{
    //
    public function index(){
        $marches = marche::all();
        return response()->json($marches);
    }

    public function store (request $request){
        $marche = new marche();
        $marche->nom_marche  = $request->nom_marche;
        $marche->photo_marche  = $request->photo_marche;
        $marche->contact_marche  = $request->contact_marche;
        $marche->adresse_marche  = $request->adresse_marche;
        $marche->localisation_marche  = $request->localisation_marche;
        $marche->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $marche = marche::find($id);
        if (is_null($marche)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($marche);
    }

    public function destroy($marche){
        $marche = marche::find($marche);
        $valider = $marche->delete();
        if($valider){
            return response()->json(['message'=>'marche est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }
    }
}
