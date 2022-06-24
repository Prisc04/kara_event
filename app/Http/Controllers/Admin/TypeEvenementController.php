<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\type_evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeEvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_evenements = type_evenement::all();
        return view('interface_admin.listeTypeEvenement',compact('type_evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterTypeEvenement');
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
            'nom_type_event'=>'required',
            'description_type_event'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

                type_evenement::create([
                    'nom_type_event'=>$request->nom_type_event,
                    'description_type_event'=>$request->description_type_event,

                ]);

                return redirect()->route('admin.listeTypeEvenement')->with('success', "enregistrement avec success");

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
        $type_evenement= type_evenement::find($id);
        return view('interface_admin.editeTypeEvenement', compact('type_evenement'));
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
        $type_evenement=type_evenement::find($id);
        $type_evenement->nom_type_event = $request->nom_type_event;
        $type_evenement->description_type_event = $request->description_type_event;

        $validator= Validator::make($request->all(),[
            'nom_type_event'=>'required',
            'description_type_event'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $type_evenement->update([
                'nom_type_event'=>$request->nom_type_event,
                'description_type_event'=>$request->description_type_event,

            ]);
            $type_evenement->save();
            return redirect()->route('admin.listeTypeEvenement')->with('success', "enregistrement avec success");

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
        $type_evenement= type_evenement::find($id);
        $type_evenement->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_TypeEvenement($id){
        $type_evenement =  type_evenement::find($id);

        $type_evenement->status_type_event = 1;

        $type_evenement->update();

        return redirect()->back()->with('status_type_event', 'le type evenement '.$type_evenement->nom_type_event.' a été activé avec succès');
    }

    public function desactiver_TypeEvenement($id){
        $type_evenement =  type_evenement::find($id);

        $type_evenement->status_type_event = 0;

        $type_evenement->update();

        return redirect()->back()->with('status_type_event', 'le type evenement '.$type_evenement->nom_type_event.' a été desactiver avec succès');
    }
}
