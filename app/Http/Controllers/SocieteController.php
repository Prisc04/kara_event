<?php

namespace App\Http\Controllers;

use App\Models\societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    //
    public function index(){
        $societes = societe::all();
        return response()->json($societes);

    }

    public function store(Request $request){

        $societe = new societe();
        $societe->raison_social  = $request->raison_social;
        $societe->adresse_societe  = $request->adresse_societe;
        $societe->numero_societe  = $request->numero_societe;
        $societe->email_societe  = $request->email_societe;
        $societe->type_societe_id = $request->type_societe_id;
        $societe->nif_societe = $request->nif_societe;
        $societe->rccm_societe = $request->rccm_societe;
        $societe->logo_societe  = $request->logo_societe;
        $societe->photo_societe = $request->photo_societe;
        $societe->note_societe  = $request->note_societe;


        $save= $societe->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $societe = societe::find($id);
        if (is_null($societe)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($societe);
    }

    public function destroy($societe){
        $societe = societe::find($societe);
        $valider = $societe->delete();
        if($valider){
            return response()->json(['message'=>'societe est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}


