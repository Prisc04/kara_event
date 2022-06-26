<?php

namespace App\Http\Controllers;

use App\Models\programme_evala;
use Illuminate\Http\Request;

class ProgrammeEvalaController extends Controller
{
    //
    public function index(){
        $programme_evalas = programme_evala::all();
        return response()->json($programme_evalas);
    }

    public function store (request $request){
        $programme_evala = new programme_evala();
        $programme_evala->jour_programme_evala = $request->jour_programme_evala;
        $programme_evala->date_programme_evala = $request->date_programme_evala;
        $programme_evala->rencontre_programme_evala  = $request->rencontre_programme_evala;
        $programme_evala->lieu_programme_evala  = $request->lieu_programme_evala;
        $programme_evala->localisation_programme_evala  = $request->localisation_programme_evala;
        $programme_evala->heure_programme_evala  = $request->heure_programme_evala;
        $programme_evala->observation_programme_evala  = $request->observation_programme_evala;
        $save= $programme_evala->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $programme_evala = programme_evala::find($id);
        if (is_null($programme_evala)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($programme_evala);
    }

    public function destroy($programme_evala){
        $programme_evala = programme_evala::find($programme_evala);
        $valider = $programme_evala->delete();
        if($valider){
            return response()->json(['message'=>'programme_evala est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }

}
