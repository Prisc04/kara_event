<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServieController extends Controller
{
    //
    public function index(){
        $services = service::all();
        return response()->json($services);
    }

    public function store(Request $request){

        $service = new service();
        $service->nom_service  = $request->nom_service;
        $service->photo_service  = $request->photo_service;
        $save= $service->save();
        return 'ajouter avec success';
    }

    public function update(Request $request, service $service){

        $service->nom_service  = $request->nom_service;
        $service->photo_service  = $request->photo_service;
        $service->update();
        return response()->json('mise à jour avec success', 200);
    }

    public function show($id){
        $service = service::find($id);
        if (is_null($service)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($service);
    }

    public function destroy($service){
        $service = service::find($service);
        $valider = $service->delete();
        if($valider){
            return response()->json(['message'=>'service est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
