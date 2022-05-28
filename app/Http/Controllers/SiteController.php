<?php

namespace App\Http\Controllers;

use App\Models\site_touristique;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //

    public function index(){
        $site_touristiques = site_touristique::all();
        return response()->json($site_touristiques);
    }

    public function store(Request $request){

        $site_touristique = new site_touristique();
        $site_touristique->libelle_site  = $request->libelle_site;
        $site_touristique->nom_site  = $request->nom_site;
        $site_touristique->description_site  = $request->description_site;
        $site_touristique->photo_site  = $request->photo_site;
        $save= $site_touristique->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $site_touristique = site_touristique::find($id);
        if (is_null($site_touristique)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($site_touristique);
    }

    public function destroy($site_touristique){
        $site_touristique = site_touristique::find($site_touristique);
        $valider = $site_touristique->delete();
        if($valider){
            return response()->json(['message'=>'site_touristique est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }


}
