<?php

namespace App\Http\Controllers;

use App\Models\agent;
use App\Models\agrnce;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    //
    public function index(){
        $agences = agent::all();
        return response()->json($agences);
    }

    public function store (request $request){
        $agence = new agent();
        $agence->nom_agence  = $request->nom_agence;
        $agence->photo_agence  = $request->photo_agence;
        $agence->adresse_agence  = $request->adresse_agence;
        $agence->localisation_agence  = $request->localisation_agence;
        $agence->contact_agence  = $request->adresse_agence;
        $save= $agence->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $agence = agent::find($id);
        if (is_null($agence)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($agence);
    }

    public function destroy($agence){
        $agence =agent::find($agence);
        $valider = $agence->delete();
        if($valider){
            return response()->json(['message'=>'agence est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
