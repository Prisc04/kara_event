<?php

namespace App\Http\Controllers;

use App\Models\evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    //
    public function index(){
        $evenements = evenement::all();
        return response()->json($evenements);
    }

    public function store(Request $request){

        $evenement = new evenement();
        $evenement->libelle_event  = $request->libelle_event;
        $evenement->date_debut_event  = $request->date_debut_event;
        $evenement->date_fin_event  = $request->date_fin_event;
        $evenement->photo_event  = $request->photo_event;
        $evenement->description_event  = $request->description_event;
        $save= $evenement->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $evenement = evenement::find($id);
        if (is_null($evenement)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($evenement);
    }

    public function destroy($evenement){
        $evenement = evenement::find($evenement);
        $valider = $evenement->delete();
        if($valider){
            return response()->json(['message'=>'evenement est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
