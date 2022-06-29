<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stations = station::all();
        return view('interface_admin.listeStation',compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterStation');
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
        $station = new station() ;
        $station->nom_station = $request->input('nom_station');
        $station->photo_station = $request->input('photo_station');
        $station->adresse_station = $request->input('adresse_station');
        $station->localisation_station = $request->input('localisation_station');
        $station->contact_station = $request->input('contact_station');

        if($request->hasfile('photo_station')){
            $file = $request->file('photo_station');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/station/', $filename);
            $station->photo_station = $filename;
        }
        $station->save();
        return redirect()->route('admin.listeStation')->with('success', "enregistrement avec success");
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
        $station= station::find($id);
        return view('interface_admin.editeStation', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $station= station::find($id);
        $station->nom_station = $request->nom_station;
        $station->photo_station = $request->photo_station;
        $station->adresse_station = $request->adresse_station;
        $station->localisation_station = $request->localisation_station;
        $station->contact_station = $request->contact_station;

        $validator= Validator::make($request->all(),[
            'nom_station'=>'required',
            'photo_station'=>'required|image',
            'adresse_station'=>'required',
            'localisation_station'=>'required',
            'contact_station'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_station');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/station/', $filename);


                $station->update([
                    'nom_station'=>$request->nom_station,
                    'photo_station'=>$filename,
                    'adresse_station'=>$request->adresse_station,
                    'localisation_station'=>$request->localisation_station,
                    'contact_station'=>$request->contact_station,
                ]);
            return redirect()->route('admin.listeStation')->with('success', "enregistrement avec success");
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
        $station= station::find($id);
        $station->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Station($id){
        $station =  station::find($id);

        $station->status_station = 1;

        $station->update();

        return redirect()->back()->with('status_station', 'station '.$station->nom_station.' a été activé avec succès');
    }

    public function desactiver_Station($id){
        $station = station::find($id);

        $station->status_station = 0;

        $station->update();

        return redirect()->back()->with('status_station', 'pharmacie'.$station->nom_station.' a été desactiver avec succès');
    }
}
