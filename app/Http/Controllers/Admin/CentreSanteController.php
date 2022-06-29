<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\centre_sante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CentreSanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $centre_santes = centre_sante::all();
        return view('interface_admin.listeCentreSante',compact('centre_santes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterCentreSante');
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
        $centre_sante = new centre_sante() ;

        $centre_sante->nom_centre_sante = $request->input('nom_centre_sante');
        $centre_sante->photo_centre_sante = $request->input('photo_centre_sante');
        $centre_sante->adresse_centre_sante = $request->input('adresse_centre_sante');
        $centre_sante->localisation_centre_sante = $request->input('localisation_centre_sante');
        $centre_sante->contact_centre_sante = $request->input('contact_centre_sante');

        if($request->hasfile('photo_centre_sante')){
            $file = $request->file('photo_centre_sante');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/centre_sante/', $filename);
            $centre_sante->photo_centre_sante = $filename;
        }
        $centre_sante->save();
        return redirect()->route('admin.listeCentreSante')->with('success', "enregistrement avec success");
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
        $centre_sante= centre_sante::find($id);
        return view('interface_admin.editeCentreSante', compact('centre_sante'));
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
            $centre_sante= centre_sante::find($id);
            $centre_sante->nom_centre_sante = $request->nom_centre_sante;
            $centre_sante->photo_centre_sante = $request->photo_centre_sante;
            $centre_sante->adresse_centre_sante = $request->adresse_centre_sante;
            $centre_sante->localisation_centre_sante = $request->localisation_centre_sante;
            $centre_sante->contact_centre_sante = $request->contact_centre_sante;

            $validator= Validator::make($request->all(),[
                'nom_centre_sante'=>'required',
                'photo_centre_sante'=>'required|image',
                'adresse_centre_sante'=>'required',
                'localisation_centre_sante'=>'required',
                'contact_centre_sante'=>'required',

            ]);
            if(!$validator){
                return redirect()->back()->with('fail', "echec d'enregistrement");
            }else{

                $file = $request->file('photo_centre_sante');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('upload/centre_sante/', $filename);

                    $centre_sante->update([
                        'nom_centre_sante'=>$request->nom_centre_sante,
                        'photo_centre_sante'=>$filename,
                        'adresse_centre_sante'=>$request->adresse_centre_sante,
                        'localisation_centre_sante'=>$request->localisation_centre_sante,
                        'contact_centre_sante'=>$request->contact_centre_sante,
                    ]);
                return redirect()->route('admin.listeCentreSante')->with('success', "enregistrement avec success");
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
        $centre_sante= centre_sante::find($id);
        $centre_sante->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_CentreSante($id){
        $centre_sante =  centre_sante::find($id);

        $centre_sante->status_centre_sante = 1;

        $centre_sante->update();

        return redirect()->back()->with('status_centre_sante', 'centre_sante '.$centre_sante->nom_centre_sante.' a été activé avec succès');
    }

    public function desactiver_CentreSante($id){
        $centre_sante =  centre_sante::find($id);

        $centre_sante->status_centre_sante = 0;

        $centre_sante->update();

        return redirect()->back()->with('status_centre_sante', 'centre_sante'.$centre_sante->nom_centre_sante.' a été desactiver avec succès');
    }
}
