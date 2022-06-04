<?php

namespace App\Http\Controllers;

use App\Models\slider_evenement;
use Illuminate\Http\Request;

class SliderEvenementController extends Controller
{
    //
    public function index(){
        $slider_evenements = slider_evenement::all();
        return response()->json($slider_evenements);
    }

    public function store (request $request){
        $slider_evenement = new slider_evenement();
        $slider_evenement->titre_slider_evenement  = $request->titre_slider_evenement;
        $slider_evenement->description_slider_accueil  = $request->description_slider_evenement;
        $slider_evenement->photo_slider_accueil  = $request->photo_slider_evenement;

        $save= $slider_evenement->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $slider_evenement = slider_evenement::find($id);
        if (is_null($slider_evenement)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($slider_evenement);
    }

    public function destroy($slider_evenement){
        $slider_evenement = slider_evenement::find($slider_evenement);
        $valider = $slider_evenement->delete();
        if($valider){
            return response()->json(['message'=>'slider_evenement est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
