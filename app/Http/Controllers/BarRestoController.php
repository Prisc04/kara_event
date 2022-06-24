<?php

namespace App\Http\Controllers;

use App\Models\bar_resto;
use Illuminate\Http\Request;

class BarRestoController extends Controller
{
    //
    public function index(){
        $bar_restos = bar_resto::all();
        return response()->json($bar_restos);
    }

    public function store (request $request){
        $bar_resto = new  bar_resto();
        $bar_resto->nom_bar_resto  = $request->nom_bar_resto;
        $bar_resto->adresse_bar_resto  = $request->adresse_bar_resto;
        $bar_resto->photo_bar_resto  = $request->photo_bar_resto;
        $bar_resto->localisation_bar_resto  = $request->localisation_bar_resto;
        $bar_resto->description_bar_resto  = $request->description_bar_resto;
        $bar_resto->email_bar_resto  = $request->email_bar_resto;
        $bar_resto->whatsapp_bar_resto  = $request->whatsapp_bar_resto;
        $bar_resto->site_bar_resto  = $request->site_bar_resto;

        $save= $bar_resto->save();
        return 'ajouter avec success';
    }


    public function show($id){
        $bar_resto = bar_resto::find($id);
        if (is_null($bar_resto)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($bar_resto);
    }

    public function destroy($bar_resto){
        $bar_resto = bar_resto::find($bar_resto);
        $valider = $bar_resto->delete();
        if($valider){
            return response()->json(['message'=>'bar_resto est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
