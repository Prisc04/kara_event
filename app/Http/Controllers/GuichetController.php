<?php

namespace App\Http\Controllers;

use App\Models\guichet_automatique;
use Illuminate\Http\Request;

class GuichetController extends Controller
{
    //
    public function index(){
        $guichet_automatiques = guichet_automatique::all();
        return response()->json($guichet_automatiques);
    }

    public function store (request $request){
        $guichet_automatique = new  guichet_automatique();

         $guichet_automatique->libelle_guichet  = $request->libelle_guichet;
         $guichet_automatique->photo_guichet  = $request->photo_guichet;
         $guichet_automatique->description_guichet  = $request->description_guichet;

         $save= $guichet_automatique->save();
         return 'ajouter avec success';
    }

    public function show($id){
        $guichet_automatique = guichet_automatique::find($id);
        if (is_null($guichet_automatique)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($guichet_automatique);
    }

    public function destroy($guichet_automatique){
        $guichet_automatique = guichet_automatique::find($guichet_automatique);
        $valider = $guichet_automatique->delete();
        if($valider){
            return response()->json(['message'=>'guichet automatique est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }

}
