<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\marche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class MarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marches = marche::all();
        return view('interface_admin.listeMarche',compact('marches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterMarche');
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
        $marche = new marche() ;
        $marche->nom_marche = $request->input('nom_marche');
        $marche->photo_marche = $request->input('photo_marche');
        $marche->adresse_marche = $request->input('adresse_marche');
        $marche->localisation_marche = $request->input('localisation_marche');


        if($request->hasfile('photo_marche')){
            $file = $request->file('photo_marche');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/marche/', $filename);
            $marche->photo_marche = $filename;
        }
        $marche->save();
        return redirect()->route('admin.listeMarche')->with('success', "enregistrement avec success");
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
        $marche= marche::find($id);
        return view('interface_admin.editeMarche', compact('marche'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $marche= marche::find($id);
        $marche->nom_marche = $request->nom_marche;
        $marche->photo_marche = $request->photo_marche;
        $marche->adresse_marche = $request->adresse_marche;
        $marche->localisation_marche = $request->localisation_marche;


        $validator= Validator::make($request->all(),[
            'nom_marche'=>'required',
            'photo_marche'=>'required|image',
            'adresse_marche'=>'required',
            'localisation_marche'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_marche');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/marche/', $filename);


                $marche->update([
                    'nom_marche'=>$request->nom_marche,
                    'photo_marche'=>$filename,
                    'adresse_marche'=>$request->adresse_marche,
                    'localisation_marche'=>$request->localisation_marche,

                ]);
            return redirect()->route('admin.listeMarche')->with('success', "enregistrement avec success");
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
        $marche=marche::find($id);
        $marche->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Marche($id){
        $marche =  marche::find($id);

        $marche->status_marche = 1;

        $marche->update();

        return redirect()->back()->with('status_marche', 'Marché '.$marche->nom_marche.' a été activé avec succès');
    }

    public function desactiver_Marche($id){
        $marche =  marche::find($id);

        $marche->status_marche = 0;

        $marche->update();

        return redirect()->back()->with('status_marche', 'Marché'.$marche->nom_marche.' a été desactiver avec succès');
    }
}
