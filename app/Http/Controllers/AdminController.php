<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index(){
        $admins = Admin::all();
        return response()->json($admins);
    }

    public function store(Request $request){

        $admin = new Admin();
        $admin->admin_nom  = $request->nom_utilisateur;
        $admin->admin_prenom  = $request->prenom_utilisateur;
        $admin->admin_telephone  = $request->telephone;
        $admin->admin_role  = $request->role;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $save= $admin->save();
        return 'ajouter avec success';
    }

    public function show($id){
        $admin = admin::find($id);
        if (is_null($admin)) {
            return response()->json('Element non retrouvé', 404);
        }
        return response()->json($admin);
    }

    public function destroy($admin){
        $admin = admin::find($admin);
        $valider = $admin->delete();
        if($valider){
            return response()->json(['message'=>'admin est supprimé avec success']);
        }else{
            return response()->json(['message'=>'Erreur lors de la suppression ']);
        }

    }


}
