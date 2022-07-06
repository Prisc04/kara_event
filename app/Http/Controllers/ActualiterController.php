<?php

namespace App\Http\Controllers;

use App\Models\actualite;
use Illuminate\Http\Request;

class ActualiterController extends Controller
{
    //
    public function index(){
        $actualites = actualite::all();
        return response()->json($actualites);
    }

    public function store (request $request){
        $actualite = new actualite();
        $actualite->nom_acteur  = $request->nom_acteurr;
        $actualite->prenom_acteur  = $request->prenom_acteur;
        $actualite->titre_actualite  = $request->titre_actualite;
        $actualite->description_actualite  = $request->description_actualite;
        $actualite->photo_actualite  = $request->photo_actualite;
        $actualite->date_actualite  = $request->date_actualite;
        $save= $actualite->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $actualite = actualite::find($id);
        if (is_null($actualite)) {
            return response()->json('Actualite non retrouvé', 404);
        }
        return response()->json($actualite);
    }

    public function destroy($actualite){
        $actualite = actualite::find($actualite);
        $valider = $actualite->delete();
        if($valider){
            return response()->json(['message'=>'actualité est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
