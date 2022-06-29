<?php

namespace App\Http\Controllers;

use App\Models\station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    //
    public function index(){
        $stations = station::all();
        return response()->json($stations);
    }

    public function store (request $request){
        $station = new station();
        $station->nom_station  = $request->nom_station;
        $station->photo_station  = $request->photo_station;
        $station->contact_station  = $request->contact_station;
        $station->adresse_station  = $request->adresse_station;
        $station->localisation_station  = $request->localisation_station;
        $station->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $station = station::find($id);
        if (is_null($station)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($station);
    }

    public function destroy($station){
        $station = station::find($station);
        $valider = $station->delete();
        if($valider){
            return response()->json(['message'=>'station est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}

