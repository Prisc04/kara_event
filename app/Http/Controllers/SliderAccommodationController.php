<?php

namespace App\Http\Controllers;

use App\Models\slider_accommodation;
use Illuminate\Http\Request;

class SliderAccommodationController extends Controller
{
    //
    public function index(){
        $slider_accommodations = slider_accommodation::all();
        return response()->json($slider_accommodations);
    }

    public function store (request $request){
        $slider_accommodation = new slider_accommodation();
        $slider_accommodation->titre_slider_accommodation  = $request->titre_slider_accommodation;
        $slider_accommodation->description_slider_accommodation  = $request->description_slider_accommodation;
        $slider_accommodation->photo_slider_accommodation  = $request->photo_slider_accommodation;

        $save= $slider_accommodation->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $slider_accommodation = slider_accommodation::find($id);
        if (is_null($slider_accommodation)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($slider_accommodation);
    }

    public function destroy($slider_accommodation){
        $slider_accommodation = slider_accommodation::find($slider_accommodation);
        $valider = $slider_accommodation->delete();
        if($valider){
            return response()->json(['message'=>'slider_accommodation est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
