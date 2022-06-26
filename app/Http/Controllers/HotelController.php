<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function index(){
        $hotels = hotel::all();
        return response()->json($hotels);
    }

    public function store (request $request){
        $hotel = new  hotel();
        $hotel->nom_hotel  = $request->nom_hotel;
        $hotel->adresse_hotel  = $request->adresse_hotel;
        $hotel->photo_hotel  = $request->photo_hotel;
        $hotel->localisation_hotel  = $request->localisation_hotel;
        $hotel->description_hotel  = $request->description_hotel;
        $hotel->contact_hotel  = $request->contact_hotel;
        $hotel->email_hotel  = $request->email_hotel;
        $hotel->whatsapp_hotel  = $request->whatsapp_hotel;
        $hotel->site_hotel  = $request->site_hotel;

        $save= $hotel->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $hotel = hotel::find($id);
        if (is_null($hotel)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($hotel);
    }

    public function destroy($hotel){
        $hotel = hotel::find($hotel);
        $valider = $hotel->delete();
        if($valider){
            return response()->json(['message'=>'hotel est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
