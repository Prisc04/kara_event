<?php

namespace App\Http\Controllers;

use App\Models\agrnce;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    //
    public function index(){
        $agences = agrnce::all();
        return response()->json($agences);
    }

    public function store (request $request){
        $agence = new agrnce();
        $agence->nom_agence  = $request->nom_agence;
        $agence->photo_agence  = $request->photo_agence;
        $agence->description_agence  = $request->description_agence;
        $agence->localisation_agence  = $request->localisation_agence;
        $save= $agence->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $agence = agrnce::find($id);
        if (is_null($agence)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($agence);
    }

    public function destroy($agence){
        $agence = agrnce::find($agence);
        $valider = $agence->delete();
        if($valider){
            return response()->json(['message'=>'agence est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
