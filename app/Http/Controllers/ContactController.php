<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $contacts = contact::all();
        return response()->json($contacts);
    }

    public function store (request $request){
        $contact = new contact();
        $contact->nom_contact  = $request->nom_contact;
        $contact->email_contact  = $request->email_contact;
        $contact->telephone_contact  = $request->telephone_contact;
        $contact->message_contact  = $request->message_contact;
        $save= $contact->save();
        return 'ajouter avec success';

    }

    public function show($id){
        $contact =contact::find($id);
        if (is_null($contact)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($contact);
    }

    public function destroy($contact){
        $contact = contact::find($contact);
        $valider = $contact->delete();
        if($valider){
            return response()->json(['message'=>'contact est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }
}
