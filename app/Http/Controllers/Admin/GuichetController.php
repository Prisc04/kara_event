<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\guichet_automatique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class GuichetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guichet_automatiques = guichet_automatique::all();
        return view('interface_admin.listeGuichet',compact('guichet_automatiques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterGuichet');
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
        $guichet_automatique = new guichet_automatique() ;
        $guichet_automatique->nom_guichet = $request->input('nom_guichet');
        $guichet_automatique->photo_guichet = $request->input('photo_guichet');
        $guichet_automatique->description_guichet = $request->input('description_guichet');
        $guichet_automatique->localisation_guichet = $request->input('localisation_guichet');

        if($request->hasfile('photo_guichet')){
            $file = $request->file('photo_guichet');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/guichet/', $filename);
            $guichet_automatique->photo_guichet = $filename;
        }
        $guichet_automatique->save();
        return redirect()->route('admin.listeGuichet')->with('success', "enregistrement avec success");
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
        $guichet_automatique= guichet_automatique::find($id);
        return view('interface_admin.editeGuichet', compact('guichet_automatique'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $guichet_automatique= guichet_automatique::find($id);
        $guichet_automatique->nom_guichet = $request->nom_guichet;
        $guichet_automatique->photo_guichet = $request->photo_guichet;
        $guichet_automatique->description_guichet = $request->description_guichet;
        $guichet_automatique->localisation_guichet = $request->localisation_guichet;

        $validator= Validator::make($request->all(),[
            'nom_guichet'=>'required',
            'photo_guichet'=>'required|image',
            'description_guichet'=>'required',
            'localisation_guichet'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_guichet');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/guichet/', $filename);


                $guichet_automatique->update([
                    'nom_guichet'=>$request->nom_guichet,
                    'photo_guichet'=>$filename,
                    'description_guichet'=>$request->description_guichet,
                    'localisation_guichet'=>$request->localisation_guichet,
                ]);
            return redirect()->route('admin.listeGuichet')->with('success', "enregistrement avec success");
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
        $guichet_automatique= guichet_automatique::find($id);
        $guichet_automatique->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Guichet($id){
        $guichet_automatique =  guichet_automatique::find($id);

        $guichet_automatique->status_guichet = 1;

        $guichet_automatique->update();

        return redirect()->back()->with('status_guichet', 'guichet_automatique '.$guichet_automatique->nom_guichet.' a été activé avec succès');
    }

    public function desactiver_Guichet($id){
        $guichet_automatique =  guichet_automatique::find($id);

        $guichet_automatique->status_guichet = 0;

        $guichet_automatique->update();

        return redirect()->back()->with('status_guichet', 'guichet_automatique'.$guichet_automatique->nom_guichet.' a été desactiver avec succès');
    }
}
