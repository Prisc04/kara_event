<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_stations = TypeStation::all();
        return view('interface_admin.listeTypeStation',compact('type_stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterTypeStation');
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
            'libelle'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

                TypeStation::create([
                    'libelle'=>$request->libelle,

                ]);
                return redirect()->route('admin.listeTypeStation')->with('success', "enregistrement avec success");

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
        $type_station= TypeStation::find($id);
        return view('interface_admin.editeTypeStation', compact('type_station'));
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
        $type_station= TypeStation::find($id);
        $type_station->libelle = $request->libelle;

        $validator= Validator::make($request->all(),[
            'libelle'=>'required',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $type_station->update([
                'libelle'=>$request->libelle,
            ]);
            $type_station->save();
            return redirect()->route('admin.listeTypeStation')->with('success', "enregistrement avec success");

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
        $type_station= TypeStation::find($id);
        $type_station->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activerTypeStation($id){
        $type_station =  TypeStation::find($id);

        $type_station->status = 1;

        $type_station->update();

        return redirect()->back()->with('status', 'le type station '.$type_station->libelle.' a été activé avec succès');
    }

    public function desactiverTypeStation($id){
        $type_station =  TypeStation::find($id);

        $type_station->status = 0;

        $type_station->update();

        return redirect()->back()->with('status', 'le type station '.$type_station->libelle.' a été desactiver avec succès');
    }
}
