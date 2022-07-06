<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actualites = actualite::all();
        return view('interface_admin.listeactualite',compact('actualites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouteractualite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $actualite = new actualite() ;
        $actualite->nom_acteur = $request->input('nom_acteur');
        $actualite->prenom_acteur = $request->input('prenom_acteur');
        $actualite->titre_actualite  = $request->input('titre_actualite');
        $actualite->description_actualite = $request->input('description_actualite');
        $actualite->photo_actualite  = $request->input('photo_actualite ');
        $actualite->date_actualite = $request->input('date_actualite');

        if($request->hasfile('photo_actualite')){
            $file = $request->file('photo_actualite');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/actualite/', $filename);
            $actualite->photo_actualite = $filename;
        }
        $actualite->save();
        return redirect()->route('admin.listeactualite')->with('success', "enregistrement avec success");
    }

     /*
    public function store(Request $request)
    {
        //
        $validator= Validator::make($request->all(),[
            'nom_acteur'=>'required',
            'prenom_acteur'=>'required',
            'titre_actualite'=>'required',
            'description_actualite'=>'required',
            'date_actualite'=>'required',
            'photo_actualite'=>'required|image',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='files/';
            $file=$request->file('photo_actualite');
            $file_name = "images/".time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){

                actualite::create([
                    'nom_acteur'=>$request->nom_acteur,
                    'prenom_acteur'=>$request->prenom_acteur,
                    'titre_actualite'=>$request->titre_actualite,
                    'description_actualite'=>$request->description_actualite,
                    'date_actualite'=>$request->date_actualite,
                    'photo_actualite'=>$file_name,
                ]);
                return redirect()->route('admin.listeactualite')->with('success', "enregistrement avec success");
            }
        }
    }
    */
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
        $actualite= actualite::find($id);
        return view('interface_admin.editeactualite', compact('actualite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $actualite= actualite::find($id);
        $actualite->nom_acteur = $request->nom_acteur;
        $actualite->prenom_acteur = $request->prenom_acteur;
        $actualite->titre_actualite = $request->titre_actualite;
        $actualite->date_actualite  = $request->date_actualite;
        $actualite->description_actualite = $request->description_actualite;

        $validator= Validator::make($request->all(),[
            'nom_acteur'=>'required',
            'prenom_acteur'=>'required',
            'titre_actualite'=>'required',
            'description_actualite'=>'required',
            'date_actualite'=>'required',
            'photo_actualite'=>'required|image',
        ]);

    if(!$validator){
        return redirect()->back()->with('fail', "echec d'enregistrement");
    }else{

        $file = $request->file('photo_actualite');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('upload/actualite/', $filename);

            $actualite->update([
                'nom_acteur'=>$request->nom_acteur,
                'prenom_acteur'=>$request->prenom_acteur,
                'titre_actualite'=>$request->titre_actualite,
                'description_actualite'=>$request->description_actualite,
                'photo_actualite'=>$filename,
                'date_actualite'=>$request->date_actualite,
            ]);
        return redirect()->route('admin.listeactualite')->with('success', "enregistrement avec success");
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
        $actualite= actualite::find($id);
        $actualite->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_actualite($id){
        $actualite =  actualite::find($id);

        $actualite->status_actualite = 1;

        $actualite->update();

        return redirect()->back()->with('status_actualite', ' Actualite '.$actualite->nom_acteur.' a été activé avec succès');
    }

    public function desactiver_actualite($id){
        $actualite =  actualite::find($id);

        $actualite->status_actualite = 0;

        $actualite->update();

        return redirect()->back()->with('status_actualite', 'Actualite '.$actualite->nom_acteur.' a été desactiver avec succès');
    }
}
