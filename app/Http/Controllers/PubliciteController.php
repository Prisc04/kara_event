<?php

namespace App\Http\Controllers;

use App\Models\publicite;
use Illuminate\Http\Request;

class PubliciteController extends Controller
{
    //
    public function index(){
        $publicites = publicite::all();
        return response()->json($publicites);
    }

    public function store (request $request){
        $publicite = new publicite();
        $publicite->nom_socite  = $request->nom_socite;
        $publicite->description_publicite  = $request->description_publicite;
        $publicite->photo_publicite  = $request->photo_publicite;
        $publicite->date_publicite  = $request->date_publicite;
        $save= $publicite->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $publicite = publicite::find($id);
        if (is_null($publicite)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($publicite);
    }

    public function destroy($publicite){
        $publicite = publicite::find($publicite);
        $valider = $publicite->delete();
        if($valider){
            return response()->json(['message'=>'publicite est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
