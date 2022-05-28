<?php

namespace App\Http\Controllers;

use App\Models\lutteur;
use Illuminate\Http\Request;

class LutteurController extends Controller
{
    //
    public function index(){
        $lutteurs = lutteur::all();
        return response()->json($lutteurs);
    }

    public function store(Request $request){

        $lutteur = new lutteur();
        $lutteur->nom_lutteur  = $request->nom_lutteur;
        $lutteur->prenom_lutteur  = $request->prenom_lutteur;
        $lutteur->photo_lutteur  = $request->photo_lutteur;

        $save= $lutteur->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $lutteur = lutteur::find($id);
        if (is_null($lutteur)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($lutteur);
    }

    public function destroy($lutteur){
        $lutteur = lutteur::find($lutteur);
        $valider = $lutteur->delete();
        if($valider){
            return response()->json(['message'=>'lutteur est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }

}
