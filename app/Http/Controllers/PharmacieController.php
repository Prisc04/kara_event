<?php

namespace App\Http\Controllers;

use App\Models\pharmacie;
use Illuminate\Http\Request;

class PharmacieController extends Controller
{
    public function index(){
        $pharmacies = pharmacie::all();
        return response()->json($pharmacies);
    }

    public function store (request $request){
       $pharmacie = new  pharmacie();
        $pharmacie->nom_pharmacie  = $request->nom_pharmacie;
        $pharmacie->adresse_pharmacie  = $request->adresse_pharmacie;
        $pharmacie->contact_pharmacie  = $request->contact_pharmacie;
        $pharmacie->photo_pharmacie  = $request->photo_pharmacie;
        $pharmacie->localisation_pharmacie  = $request->localisation_pharmacie;

        $save= $pharmacie->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $pharmacie = pharmacie::find($id);
        if (is_null($pharmacie)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($pharmacie);
    }

    public function destroy($hotel){
        $pharmacie = pharmacie::find($hotel);
        $valider = $pharmacie->delete();
        if($valider){
            return response()->json(['message'=>'pharmacie est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}

