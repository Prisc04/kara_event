<?php

namespace App\Http\Controllers;

use App\Models\type_evenement;
use Illuminate\Http\Request;

class TypeEvenemantController extends Controller
{
    //
    public function index(){
        $type_evenements = type_evenement::all();
        return response()->json($type_evenements);
    }

    public function store(Request $request){

        $type_evenement = new type_evenement();
        $type_evenement->nom_type_event  = $request->nom_type_event;
        $type_evenement->description_type_event  = $request->description_type_event;
        $save= $type_evenement->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $type_evenement = type_evenement::find($id);
        if (is_null($type_evenement)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($type_evenement);
    }

    public function destroy($type_evenement){
        $type_evenement = type_evenement::find($type_evenement);
        $valider = $type_evenement->delete();
        if($valider){
            return response()->json(['message'=>'type_evenement est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
