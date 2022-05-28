<?php

namespace App\Http\Controllers;

use App\Models\prefecture;
use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    //
    public function index(){
        $prefectures = prefecture::all();
        return response()->json($prefectures);
    }

    public function store(Request $request){

        $prefecture = new prefecture();
        $prefecture->nom_prefecture  = $request->nom_prefecture;
        $prefecture->description_prefecture  = $request->description_prefecture;
        $prefecture->photo_prefecture  = $request->photo_prefecture;
        $save= $prefecture->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $prefecture = prefecture::find($id);
        if (is_null($prefecture)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($prefecture);
    }

    public function destroy($prefecture){
        $prefecture = prefecture::find($prefecture);
        $valider = $prefecture->delete();
        if($valider){
            return response()->json(['message'=>'prefecture est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
