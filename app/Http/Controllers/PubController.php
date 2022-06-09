<?php

namespace App\Http\Controllers;

use App\Models\pub;
use Illuminate\Http\Request;

class PubController extends Controller
{
    //
    public function index(){
        $pubs = pub::all();
        return response()->json($pubs);
    }

    public function store (request $request){
        $pub = new pub();
        $pub->nom_socite  = $request->nom_socite;
        $pub->photo_publicite  = $request->photo_publicite;
        $pub->description_publicite  = $request->description_publicite;
        $pub->type_publicite_id = $request->type_publicite_id;
        $pub->date_debut_publicite  = $request->date_debut_publicite;
        $pubdate_fin_publicite  = $request->date_fin_publicite;
        $save= $pub->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $pub = pub::find($id);
        if (is_null($pub)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($pub);
    }

    public function destroy($pub){
        $pub = pub::find($pub);
        $valider = $pub->delete();
        if($valider){
            return response()->json(['message'=>'publicite est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
