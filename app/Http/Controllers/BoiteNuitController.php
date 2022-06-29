<?php

namespace App\Http\Controllers;

use App\Models\boite_nuit;
use Illuminate\Http\Request;

class BoiteNuitController extends Controller
{
    //
    public function index(){
        $boite_nuits = boite_nuit::all();
        return response()->json($boite_nuits);
    }

    public function store (request $request){
        $boite_nuit = new boite_nuit();
        $boite_nuit->nom_boite_nuit  = $request->nom_boite_nuit;
        $boite_nuit->photo_boite_nuit  = $request->photo_boite_nuit;
        $boite_nuit->contact_boite_nuit  = $request->contact_boite_nuit;
        $boite_nuit->adresse_boite_nuit  = $request->adresse_boite_nuit;
        $boite_nuit->localisation_boite_nuit  = $request->localisation_boite_nuit;
        $boite_nuit->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $boite_nuit = boite_nuit::find($id);
        if (is_null($boite_nuit)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($boite_nuit);
    }

    public function destroy($boite_nuit){
        $boite_nuit = boite_nuit::find($boite_nuit);
        $valider = $boite_nuit->delete();
        if($valider){
            return response()->json(['message'=>'boite_nuit est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
