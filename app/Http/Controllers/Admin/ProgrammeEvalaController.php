<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\programme_evala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProgrammeEvalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programme_evalas = programme_evala::all();
        return view('interface_admin.listerProgrammeEvala',compact('programme_evalas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterProgrammeEvala');
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
            'jour_programme_evala'=>'required',
            'date_programme_evala '=>'required',
            'rencontre_programme_evala'=>'required',
            'lieu_programme_evala'=>'required',
            'localisation_programme_evala'=>'required',
            'heure_programme_evala'=>'required',
            'observation_programme_evala'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            programme_evala::create([
                    'jour_programme_evala'=>$request->jour_programme_evala,
                    'date_programme_evala'=>$request->date_programme_evala,
                    'rencontre_programme_evala'=>$request->rencontre_programme_evala,
                    'lieu_programme_evala'=>$request->lieu_programme_evala,
                    'localisation_programme_evala'=>$request->localisation_programme_evala,
                    'heure_programme_evala'=>$request->heure_programme_evala,
                    'observation_programme_evala'=>$request->observation_programme_evala,
                ]);

                return redirect()->route('admin.listerProgrammeEvala')->with('success', "enregistrement avec success");
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
        $programme_evala= programme_evala::find($id);
        return view('interface_admin.editeProgrammeEvala', compact('programme_evala'));
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
        $programme_evala= programme_evala::find($id);
        $programme_evala->jour_programme_evala = $request->jour_programme_evala;
        $programme_evala->date_programme_evala = $request->date_programme_evala;
        $programme_evala->rencontre_programme_evala = $request->rencontre_programme_evala;
        $programme_evala->lieu_programme_evala = $request->lieu_programme_evala;
        $programme_evala->localisation_programme_evala  = $request->localisation_programme_evala;
        $programme_evala->heure_programme_evala = $request->heure_programme_evala;
        $programme_evala->observation_programme_evala = $request->observation_programme_evala;

        $validator= Validator::make($request->all(),[
            'jour_programme_evala'=>'required',
            'date_programme_evala'=>'required',
            'rencontre_programme_evala'=>'required',
            'lieu_programme_evala'=>'required',
            'localisation_programme_evala'=>'required',
            'heure_programme_evala'=>'required',
            'observation_programme_evala'=>'required',
        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $programme_evala->update([
                'jour_programme_evala'=>$request->jour_programme_evala,
                'date_programme_evala'=>$request->date_programme_evala,
                'rencontre_programme_evala'=>$request->rencontre_programme_evala,
                'lieu_programme_evala'=>$request->lieu_programme_evala,
                'localisation_programme_evala'=>$request->localisation_programme_evala,
                'heure_programme_evala'=>$request->heure_programme_evala,
                'observation_programme_evala'=>$request->observation_programme_evala,

            ]);
            $programme_evala->save();
            return redirect()->route('admin.listerProgrammeEvala')->with('success', "enregistrement avec success");

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
        $programme_evala= programme_evala::find($id);
        $programme_evala->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_ProgrammeEvela($id){
        $programme_evala =  programme_evala::find($id);

        $programme_evala->status_programme_evala = 1;

        $programme_evala->update();

        return redirect()->back()->with('status_programme_evala', 'le programme evala '.$programme_evala->jour_programme_evala.' a été activé avec succès');
    }

    public function desactiver_ProgrammeEvala($id){
        $programme_evala =  programme_evala::find($id);

        $programme_evala->status_programme_evala = 0;

        $programme_evala->update();

        return redirect()->back()->with('status_programme_evala', 'le programme evenement '.$programme_evala->jour_programme_evala.' a été desactiver avec succès');
    }
}
