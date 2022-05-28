<?php

namespace App\Http\Controllers;

use App\Models\ligne_commande;
use Illuminate\Http\Request;

class LigneCommandeController extends Controller
{
    //
    public function index(){
        $ligne_commandes = ligne_commande::all();
        return response()->json($ligne_commandes);
    }

    public function store(Request $request){

        $ligne_commande = new ligne_commande();
        $ligne_commande->libelle_ligine_commande  = $request->libelle_ligine_commande;
        $ligne_commande->prix_unitaire  = $request->prix_unitaire;
        $ligne_commande->total  = $request->total;
        $ligne_commande-> quantite = $request->quantite;
        $ligne_commande->date  = $request->date;
        $save= $ligne_commande->save();
        return 'ajouter avec success';
    }
}
