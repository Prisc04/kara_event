<?php

namespace App\Http\Controllers;

use App\Models\type_publicite;
use Illuminate\Http\Request;

class TypePubliciteController extends Controller
{
    //
    public function index(){
        $type_publicites = type_publicite::all();
        return response()->json($type_publicites);
    }

    public function store(Request $request){

        $type_publicite = new type_publicite();
        $type_publicite->nom_type_publicite  = $request->nom_type_publicite;
        $save= $type_publicite->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $type_publicite = type_publicite::find($id);
        if (is_null($type_publicite)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($type_publicite);
    }

    public function destroy($type_publicite){
        $type_publicite= type_publicite::find($type_publicite);
        $valider = $type_publicite->delete();
        if($valider){
            return response()->json(['message'=>'type_publicite est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
