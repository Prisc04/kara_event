<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\type_societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeSocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_societes = type_societe::all();
        return view('interface_admin.listetypesociete',compact('type_societes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajoutertypesociete');
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
        $validator= Validator::make($request->all(),[
            'libelle_type_societe'=>'required',
            'nom_type_societe'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

                type_societe::create([
                    'libelle_type_societe'=>$request->libelle_type_societe,
                    'nom_type_societe'=>$request->nom_type_societe,

                ]);

                return redirect()->route('admin.listetypesociete')->with('success', "enregistrement avec success");

        }
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
        $type_societe= type_societe::find($id);
        return view('interface_admin.editetypesociete', compact('type_societe'));
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
        $type_societe= type_societe::find($id);
        $type_societe->libelle_type_societe = $request->libelle_type_societe;
        $type_societe->nom_type_societe = $request->nom_type_societe;

        $validator= Validator::make($request->all(),[
            'libelle_type_societe'=>'required',
            'nom_type_societe'=>'required',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $type_societe->update([
                'libelle_type_societe'=>$request->libelle_type_societe,
                'nom_type_societe'=>$request->nom_type_societe,

            ]);
            $type_societe->save();
            return redirect()->route('admin.listetypesociete')->with('success', "enregistrement avec success");

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
        $type_societe= type_societe::find($id);
        $type_societe->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_typesociete($id){
        $type_societe =  type_societe::find($id);

        $type_societe->status_type_societe = 1;

        $type_societe->update();

        return redirect()->back()->with('status_type_societe', 'le type societe '.$type_societe->nom_type_societe.' a été activé avec succès');
    }

    public function desactiver_typesociete($id){
        $type_societe =  type_societe::find($id);

        $type_societe->status_type_societe = 0;

        $type_societe->update();

        return redirect()->back()->with('status_type_societe', 'le type societe '.$type_societe->nom_type_societe.' a été desactiver avec succès');
    }
}
