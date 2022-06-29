<?php

namespace App\Http\Controllers;

use App\Models\frequence_radio;
use Illuminate\Http\Request;

class FrequenceRadioController extends Controller
{
    //
    public function index(){
        $frequence_radios = frequence_radio::all();
        return response()->json($frequence_radios);
    }

    public function store (request $request){
        $frequence_radio = new frequence_radio();
        $frequence_radio->nom_radio  = $request->nom_radio;
        $frequence_radio->photo_radio  = $request->photo_radio;
        $frequence_radio->contact_radio  = $request->contact_radio;
        $frequence_radio->adresse_radio  = $request->adresse_radio;
        $frequence_radio->contact_radio  = $request->contact_radio;
        $frequence_radio->localisation_radio  = $request->localisation_radio;
        $frequence_radio->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $frequence_radio = frequence_radio::find($id);
        if (is_null($frequence_radio)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($frequence_radio);
    }

    public function destroy($frequence_radio){
        $frequence_radio = frequence_radio::find($frequence_radio);
        $valider = $frequence_radio->delete();
        if($valider){
            return response()->json(['message'=>'frequence_radio est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
