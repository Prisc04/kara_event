<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\agent;
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
        $agents = agent::all();
        return view('interface_admin.listeagence',compact('agents'));
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

    public function store(Request $request){

        $agent = new agent() ;
        $agent->nom_agence = $request->input('nom_agence');
        $agent->photo_agence = $request->input('photo_agence');
        $agent->adresse_agence = $request->input('adresse_agence');
        $agent->localisation_agence = $request->input('localisation_agence');
        $agent->contact_agence = $request->input('contact_agence');

        if($request->hasfile('photo_agence')){
            $file = $request->file('photo_agence');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/agence/', $filename);
            $agent->photo_agence = $filename;
        }
        $agent->save();
        return redirect()->route('admin.listeagence')->with('success', "enregistrement avec success");
    }


     /*
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

                agent::create([
                    'nom_agence'=>$request->nom_agence,
                    'photo_agence'=>$file_name,
                    'localisation_agence'=>$request->localisation_agence,
                    'description_agence'=>$request->description_agence,

                ]);
                return redirect()->route('admin.listeagence')->with('success', "enregistrement avec success");
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
        $agent=agent::find($id);
        return view('interface_admin.editeagence', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $agent= agent::find($id);
        $agent->nom_agence = $request->nom_agence;
        $agent->photo_agence = $request->photo_agence;
        $agent->adresse_agence = $request->adresse_agence;
        $agent->localisation_agence = $request->localisation_agence;
        $agent->contact_agence = $request->contact_agence;

        $validator= Validator::make($request->all(),[
            'nom_agence'=>'required',
            'photo_agence'=>'required|image',
            'adresse_agence'=>'required',
            'localisation_agence'=>'required',
            'contact_agence'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_agence');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/agence/', $filename);


                $agent->update([
                    'nom_agence'=>$request->nom_agence,
                    'photo_agence'=>$filename,
                    'adresse_agence'=>$request->adresse_agencee,
                    'localisation_agence'=>$request->localisation_agence,
                    'contact_agence'=>$request->contact_agence,
                ]);
            return redirect()->route('admin.listeagence')->with('success', "enregistrement avec success");
        }
    }

    /*
    public function update(Request $request, $id)
    {
        //
        $agent= agent::find($id);
        $agent->nom_agence = $request->nom_agence;
        $agent->localisation_agence = $request->localisation_agence;
        $agent->description_agence = $request->description_agence;

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
            $destination = '/file/'.$agent->photo_agence;
            if (File::exists($destination)){
                File::delete($destination);
            }
            if($upload){
                $agent->update([
                    'nom_agence'=>$request->nom_agence,
                    'photo_agence'=>$file_name,
                    'localisation_agence'=>$request->localisation_agence,
                    'description_agence'=>$request->description_agence,

                ]);
                $agent->save();
                return redirect()->route('admin.listeagence')->with('success', "enregistrement avec success");
            }
        }
    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $agent= agent::find($id);
        $agent->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_agence($id){
        $agent =  agent::find($id);

        $agent->status_agence = 1;

        $agent->update();

        return redirect()->back()->with('status_agence', 'Agence '.$agent->nom_agence.' a été activé avec succès');
    }

    public function desactiver_agence($id){
        $agent =  agent::find($id);

        $agent->status_agence = 0;

        $agent->update();

        return redirect()->back()->with('status_agence', 'Agence '.$agent->nom_agence.' a été desactiver avec succès');
    }
}
