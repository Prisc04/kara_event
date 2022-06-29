<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\frequence_radio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class FrequenceRadioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $frequence_radios = frequence_radio::all();
        return view('interface_admin.listeFrequenceRadio',compact('frequence_radios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterFrequenceRadio');
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
        $frequence_radio = new frequence_radio() ;
        $frequence_radio->nom_radio = $request->input('nom_radio');
        $frequence_radio->photo_radio = $request->input('photo_radio');
        $frequence_radio->adresse_radio = $request->input('adresse_radio');
        $frequence_radio->localisation_radio = $request->input('localisation_radio');
        $frequence_radio->contact_radio = $request->input('contact_radio');

        if($request->hasfile('photo_radio')){
            $file = $request->file('photo_radio');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/radio/', $filename);
            $frequence_radio->photo_radio = $filename;
        }
        $frequence_radio->save();
        return redirect()->route('admin.listeFrequenceRadio')->with('success', "enregistrement avec success");
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
        $frequence_radio=frequence_radio::find($id);
        return view('interface_admin.editeFrequenceRadio', compact('frequence_radio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $frequence_radio= frequence_radio::find($id);
        $frequence_radio->nom_radio = $request->nom_radio;
        $frequence_radio->photo_radio = $request->photo_radio;
        $frequence_radio->adresse_radio = $request->adresse_radio;
        $frequence_radio->localisation_radio = $request->localisation_radio;
        $frequence_radio->contact_radio = $request->contact_radio;

        $validator= Validator::make($request->all(),[
            'nom_radio'=>'required',
            'photo_radio'=>'required|image',
            'adresse_radio'=>'required',
            'localisation_radio'=>'required',
            'contact_radio'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_radio');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/radio/', $filename);


                $frequence_radio->update([
                    'nom_radio'=>$request->nom_radio,
                    'photo_radio'=>$filename,
                    'adresse_radio'=>$request->adresse_radio,
                    'localisation_radio'=>$request->localisation_radio,
                    'contact_radio'=>$request->contact_radio,
                ]);
            return redirect()->route('admin.listeFrequenceRadio')->with('success', "enregistrement avec success");
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
        $frequence_radio= frequence_radio::find($id);
        $frequence_radio->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_FrequenceRadio($id){
        $frequence_radio =  frequence_radio::find($id);

        $frequence_radio->status_radio = 1;

        $frequence_radio->update();

        return redirect()->back()->with('status_radio', 'frequence_radio '.$frequence_radio->nom_radio.' a été activé avec succès');
    }

    public function desactiver_FrequenceRadio($id){
        $frequence_radio =  frequence_radio::find($id);

        $frequence_radio->status_radio = 0;

        $frequence_radio->update();

        return redirect()->back()->with('status_radio', 'frequence_radio '.$frequence_radio->nom_radio.' a été desactiver avec succès');
    }
}
