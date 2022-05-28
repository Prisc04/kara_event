<?php

namespace App\Http\Controllers;

use App\Models\canton;
use Illuminate\Http\Request;

class CantonController extends Controller
{
    //
    public function index(){
        $cantons = canton::all();
        return response()->json($cantons);
    }

    public function store (request $request){
        $canton = new canton();
        $canton->nom_canton  = $request->nom_canton;
        $canton->description_canton  = $request->description_canton;
        $canton->photo_canton  = $request->photo_canton;
        $save= $canton->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $canton = canton::find($id);
        if (is_null($canton)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($canton);
    }

    public function destroy($canton){
        $canton = canton::find($canton);
        $valider = $canton->delete();
        if($valider){
            return response()->json(['message'=>'canton est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}


