<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\boite_nuit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class BoiteNuitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boite_nuits = boite_nuit::all();
        return view('interface_admin.listeBoiteNuit',compact('boite_nuits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterBoiteNuit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $boite_nuit = new boite_nuit() ;
        $boite_nuit->nom_boite_nuit  = $request->input('nom_boite_nuit');
        $boite_nuit->photo_boite_nuit = $request->input('photo_boite_nuit');
        $boite_nuit->adresse_boite_nuit = $request->input('adresse_boite_nuit');
        $boite_nuit->localisation_boite_nuit = $request->input('localisation_boite_nuit');

        if($request->hasfile('photo_boite_nuit')){
            $file = $request->file('photo_boite_nuit');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/boite_nuit/', $filename);
            $boite_nuit->photo_boite_nuit = $filename;
        }
        $boite_nuit->save();
        return redirect()->route('admin.listeBoiteNuit')->with('success', "enregistrement avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $boite_nuit=boite_nuit::find($id);
        return view('interface_admin.editeBoiteNuit', compact('boite_nuit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $boite_nuit= boite_nuit::find($id);
        $boite_nuit->nom_boite_nuit = $request->nom_boite_nuit;
        $boite_nuit->photo_boite_nuit = $request->photo_boite_nuit;
        $boite_nuit->adresse_boite_nuit = $request->adresse_boite_nuit;
        $boite_nuit->localisation_boite_nuit = $request->localisation_boite_nuit;

        $validator= Validator::make($request->all(),[
            'nom_boite_nuit'=>'required',
            'photo_boite_nuit'=>'required|image',
            'adresse_boite_nuit'=>'required',
            'localisation_boite_nuit'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_boite_nuit');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/boite_nuit/', $filename);


                $boite_nuit->update([
                    'nom_boite_nuit'=>$request->nom_boite_nuit,
                    'photo_boite_nuit'=>$filename,
                    'adresse_boite_nuit'=>$request->adresse_boite_nuit,
                    'localisation_boite_nuit'=>$request->localisation_boite_nuit,
                ]);
            return redirect()->route('admin.listeBoiteNuit')->with('success', "enregistrement avec success");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $boite_nuit= boite_nuit::find($id);
        $boite_nuit->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_BoiteNuit($id){
        $boite_nuit =  boite_nuit::find($id);

        $boite_nuit->status_boite_nuit = 1;

        $boite_nuit->update();

        return redirect()->back()->with('status_boite_nuit', 'boite nuit '.$boite_nuit->nom_boite_nuit.' a été activé avec succès');
    }

    public function desactiver_BoiteNuit($id){
        $boite_nuit =  boite_nuit::find($id);

        $boite_nuit->status_boite_nuit = 0;

        $boite_nuit->update();

        return redirect()->back()->with('status_boite_nuit', 'Boite nuit '.$boite_nuit->nom_boite_nuit.' a été desactiver avec succès');
    }
}
