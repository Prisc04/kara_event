<?php

namespace App\Http\Controllers;

use App\Models\gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    //
    public function index(){
        $gyms = gym::all();
        return response()->json($gyms);
    }

    public function store (request $request){
        $gym = new gym();
        $gym->nom_gym  = $request->nom_gym;
        $gym->photo_gym  = $request->photo_gym;
        $gym->contact_gym  = $request->contact_gym;
        $gym->adresse_gym  = $request->adresse_gym;
        $gym->localisation_gym  = $request->localisation_gym;
        $gym->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $gym = gym::find($id);
        if (is_null($gym)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($gym);
    }

    public function destroy($gym){
        $gym = gym::find($gym);
        $valider = $gym->delete();
        if($valider){
            return response()->json(['message'=>'gym est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
