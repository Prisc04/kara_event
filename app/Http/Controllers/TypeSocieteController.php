<?php

namespace App\Http\Controllers;

use App\Models\type_societe;
use Illuminate\Http\Request;

class TypeSocieteController extends Controller
{
    //
    public function index(){
        $type_societes = type_societe::all();
        return response()->json($type_societes);
    }

    public function store(Request $request){

        $type_societe = new type_societe();
        $type_societe->libelle_type_societe  = $request->libelle_type_societe;
        $type_societe->nom_type_societe  = $request->nom_type_societe;
        $save= $type_societe->save();
        return 'ajouter avec success';
    }

    public function update(Request $request, type_societe $type_societe){

        $type_societe->libelle_type_societe  = $request->libelle_type_societe;
        $type_societe->nom_type_societe  = $request->nom_type_societe;
        $type_societe->update();
        return response()->json('mise à jour avec success', 200);
    }

    public function show($id){
        $type_societe = type_societe::find($id);
        if (is_null($type_societe)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($type_societe);
    }

    public function destroy($type_societe){
        $type_societe= type_societe::find($type_societe);
        $valider = $type_societe->delete();
        if($valider){
            return response()->json(['message'=>'type_societe est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
