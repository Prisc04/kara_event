<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\agrnce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agences = agrnce::all();
        return view('interface_admin.listeagence',compact('agences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouteragence');
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
            'nom_agence'=>'required',
            'photo_agence'=>'required|image',
            'localisation_agence'=>'required',
            'description_agence'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='files/';
            $file=$request->file('photo_agence');
            $file_name = "images/".time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){

                agrnce::create([
                    'nom_agence'=>$request->nom_agence,
                    'photo_agence'=>$file_name,
                    'localisation_agence'=>$request->localisation_agence,
                    'description_agence'=>$request->description_agence,

                ]);
                return redirect()->route('admin.listeagence')->with('success', "enregistrement avec success");
            }
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
        $agence= agrnce::find($id);
        return view('interface_admin.editeagence', compact('agence'));
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
        $agence= agrnce::find($id);
        $agence->nom_agence = $request->nom_agence;
        $agence->localisation_agence = $request->localisation_agence;
        $agence->description_agence = $request->description_agence;

        $validator= Validator::make($request->all(),[

            'nom_agence'=>'required',
            'photo_agence'=>'required|image',
            'localisation_agence'=>'required',
            'description_agence'=>'required',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $path ='/files';
            $file=$request->file('photo_agence');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');
            $destination = '/file/'.$agence->photo_agence;
            if (File::exists($destination)){
                File::delete($destination);
            }
            if($upload){
                $agence->update([
                    'nom_agence'=>$request->nom_agence,
                    'photo_agence'=>$file_name,
                    'localisation_agence'=>$request->localisation_agence,
                    'description_agence'=>$request->description_agence,

                ]);
                $agence->save();
                return redirect()->route('admin.listeagence')->with('success', "enregistrement avec success");
            }
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
        $agence= agrnce::find($id);
        $agence->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_agence($id){
        $agence =  agrnce::find($id);

        $agence->status_agence = 1;

        $agence->update();

        return redirect()->back()->with('status_agence', 'Agence '.$agence->nom_agence.' a été activé avec succès');
    }

    public function desactiver_agence($id){
        $agence =  agrnce::find($id);

        $agence->status_agence = 0;

        $agence->update();

        return redirect()->back()->with('status_agence', 'Agence '.$agence->nom_agence.' a été desactiver avec succès');
    }
}
