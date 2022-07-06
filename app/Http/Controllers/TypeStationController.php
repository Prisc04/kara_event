<?php

namespace App\Http\Controllers;

use App\Models\TypeStation;
use Illuminate\Http\Request;

class TypeStationController extends Controller
{
    //
    public function index(){
        $type_stations = TypeStation::all();
        return response()->json($type_stations);
    }

    public function store(Request $request){

        $type_station = new TypeStation();
        $type_station->libelle  = $request->libelle;
        $type_station->save();

        return response()->json('ajouté avec success', 200);
    }

    public function update(Request $request, TypeStation $type_station){

        $type_station->libelle  = $request->libelle;
        $type_station->update();
        return response()->json('mise à jour avec success', 200);
    }

    public function show($id){
        $type_station = TypeStation::find($id);
        if (is_null($type_station)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($type_station);
    }

    public function destroy($type_station){
        $type_station= TypeStation::find($type_station);
        $valider = $type_station->delete();
        if($valider){
            return response()->json(['message'=>'type station est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }

    public function activerTypeStation(TypeStation $type_station){

        $type_station->status = 1;

        $type_station->update();

        return redirect()->back()->with('status', 'le type station '.$type_station->libelle.' a été activé avec succès');
    }

    public function desactiverTypeStation(TypeStation $type_station){

        $type_station->status = 0;

        $type_station->update();

        return redirect()->back()->with('status', 'le type station '.$type_station->libelle.' a été desactiver avec succès');
    }
}
