<?php

namespace App\Http\Controllers;

use App\Models\lieu_religieu;
use Illuminate\Http\Request;

class LieuReligieuController extends Controller
{
    //
    public function index(){
        $lieu_religieus = lieu_religieu::all();
        return response()->json($lieu_religieus);
    }

    public function store (request $request){
        $lieu_religieu = new lieu_religieu();
        $lieu_religieu->nom_lieu_religieux  = $request->nom_lieu_religieux;
        $lieu_religieu->photo_lieu_religieux  = $request->photo_lieu_religieux;
        $lieu_religieu->contact_lieu_religieux  = $request->contact_lieu_religieux;
        $lieu_religieu->adresse_lieu_religieux  = $request->adresse_lieu_religieux;
        $lieu_religieu->localisation_lieu_religieux  = $request->localisation_lieu_religieux;
        $lieu_religieu->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $lieu_religieu = lieu_religieu::find($id);
        if (is_null($lieu_religieu)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($lieu_religieu);
    }

    public function destroy($lieu_religieu){
        $lieu_religieu = lieu_religieu::find($lieu_religieu);
        $valider = $lieu_religieu->delete();
        if($valider){
            return response()->json(['message'=>'lieu_religieu est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
