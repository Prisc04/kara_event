<?php

namespace App\Http\Controllers;

use App\Models\slider_accueil;
use Illuminate\Http\Request;

class SliderAccueilController extends Controller
{
    //

    public function index(){
        $slider_accueils = slider_accueil::all();
        return response()->json($slider_accueils);
    }

    public function store (request $request){
        $slider_accueil = new slider_accueil();
        $slider_accueil->titre_slider_accueil  = $request->titre_slider_accueil;
        $slider_accueil->description_slider_accueil  = $request->description_slider_accueil;
        $slider_accueil->photo_slider_accueil  = $request->photo_slider_accueil;

        $save= $slider_accueil->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $slider_accueil = slider_accueil::find($id);
        if (is_null($slider_accueil)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($slider_accueil);
    }

    public function destroy($slider_accueil){
        $slider_accueil = slider_accueil::find($slider_accueil);
        $valider = $slider_accueil->delete();
        if($valider){
            return response()->json(['message'=>'slider_accueil est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
