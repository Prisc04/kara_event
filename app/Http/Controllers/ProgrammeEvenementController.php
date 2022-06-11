<?php

namespace App\Http\Controllers;

use App\Models\programme_evenement;
use Illuminate\Http\Request;

class ProgrammeEvenementController extends Controller
{
    //
    public function index(){
        $programme_evenements = programme_evenement::all();
        return response()->json($programme_evenements);
    }

    public function store (request $request){
        $programme_evenement = new programme_evenement();
        $programme_evenement->date_programme = $request->date_programme;
        $programme_evenement->heure_programme  = $request->heure_programme;
        $programme_evenement->match_programme  = $request->match_programme;
        $programme_evenement->lieu_programme  = $request->lieu_programme;
        $save= $programme_evenement->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $programme_evenement = programme_evenement::find($id);
        if (is_null($programme_evenement)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($programme_evenement);
    }

    public function destroy($programme_evenement){
        $programme_evenement = programme_evenement::find($programme_evenement);
        $valider = $programme_evenement->delete();
        if($valider){
            return response()->json(['message'=>'programme_evenement est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
