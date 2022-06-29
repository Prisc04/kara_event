<?php

namespace App\Http\Controllers;

use App\Models\centre_sante;
use Illuminate\Http\Request;

class CentreSanteController extends Controller
{
    //
    public function index(){
        $centre_santes = centre_sante::all();
        return response()->json($centre_santes);
    }

    public function store (request $request){
        $centre_sante = new  centre_sante();
         $centre_sante->nom_centre_sante  = $request->nom_centre_sante;
         $centre_sante->adresse_centre_sante  = $request->adresse_centre_sante;
         $centre_sante->contact_centre_sante  = $request->contact_centre_sante;
         $centre_sante->photo_centre_sante  = $request->photo_centre_sante;
         $centre_sante->localisation_centre_sante = $request->localisation_centre_sante;

         $save= $centre_sante->save();
         return 'ajouter avec success';
    }

    public function show($id){
        $centre_sante = centre_sante::find($id);
        if (is_null($centre_sante)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($centre_sante);
    }

    public function destroy($centre_sante){
        $centre_sante = centre_sante::find($centre_sante);
        $valider = $centre_sante->delete();
        if($valider){
            return response()->json(['message'=>'centre sante est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }



}
