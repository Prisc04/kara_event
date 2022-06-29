<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\lieu_religieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class LieuReligieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lieu_religieus = lieu_religieu::all();
        return view('interface_admin.listeLieuReligieu',compact('lieu_religieus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterLieuReligieu');
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
        $lieu_religieu = new lieu_religieu() ;
        $lieu_religieu->nom_lieu_religieux = $request->input('nom_lieu_religieux');
        $lieu_religieu->photo_lieu_religieux = $request->input('photo_lieu_religieux');
        $lieu_religieu->adresse_lieu_religieux = $request->input('adresse_lieu_religieux');
        $lieu_religieu->localisation_lieu_religieux = $request->input('localisation_lieu_religieux');


        if($request->hasfile('photo_lieu_religieux')){
            $file = $request->file('photo_lieu_religieux');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/lieu_religieu/', $filename);
            $lieu_religieu->photo_lieu_religieux = $filename;
        }
        $lieu_religieu->save();
        return redirect()->route('admin.listeLieuReligieu')->with('success', "enregistrement avec success");
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
        $lieu_religieu= lieu_religieu::find($id);
        return view('interface_admin.editeLieuReligieu', compact('lieu_religieu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $lieu_religieu= lieu_religieu::find($id);
        $lieu_religieu->nom_lieu_religieux = $request->nom_lieu_religieux;
        $lieu_religieu->photo_lieu_religieux = $request->photo_lieu_religieux;
        $lieu_religieu->adresse_lieu_religieux = $request->adresse_lieu_religieux;
        $lieu_religieu->localisation_lieu_religieux = $request->localisation_lieu_religieux;


        $validator= Validator::make($request->all(),[
            'nom_lieu_religieux'=>'required',
            'photo_lieu_religieux'=>'required|image',
            'adresse_lieu_religieux'=>'required',
            'localisation_lieu_relixgieu'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_lieu_religieux');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/lieu_religieu/', $filename);


                $lieu_religieu->update([
                    'nom_lieu_religieux'=>$request->nom_lieu_religieux,
                    'photo_lieu_religieux'=>$filename,
                    'adresse_lieu_religieux'=>$request->adresse_lieu_religieux,
                    'localisation_lieu_religieux'=>$request->localisation_lieu_religieux,

                ]);
            return redirect()->route('admin.listeLieuReligieu')->with('success', "enregistrement avec success");
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
        $lieu_religieu=lieu_religieu::find($id);
        $lieu_religieu->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_LieuReligieu($id){
        $lieu_religieu =  lieu_religieu::find($id);

        $lieu_religieu->status_lieu_religieux = 1;

        $lieu_religieu->update();

        return redirect()->back()->with('status_lieu_religieux', 'lieu_religieux '.$lieu_religieu->nom_lieu_religieux.' a été activé avec succès');
    }

    public function desactiver_LieuReligieu($id){
        $lieu_religieu =  lieu_religieu::find($id);

        $lieu_religieu->status_lieu_religieux = 0;

        $lieu_religieu->update();

        return redirect()->back()->with('status_lieu_religieux', 'lieu_religieux'.$lieu_religieu->nom_lieu_religieux.' a été desactiver avec succès');
    }
}
