<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gyms = gym::all();
        return view('interface_admin.listeGym',compact('gyms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterGym');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $gym = new gym() ;
        $gym->nom_gym = $request->input('nom_gym');
        $gym->photo_gym = $request->input('photo_gym');
        $gym->adresse_gym = $request->input('adresse_gym');
        $gym->localisation_gym = $request->input('localisation_gym');

        if($request->hasfile('photo_gym')){
            $file = $request->file('photo_gym');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/gym/', $filename);
            $gym->photo_gym = $filename;
        }
        $gym->save();
        return redirect()->route('admin.listeGym')->with('success', "enregistrement avec success");
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
        $gym=gym::find($id);
        return view('interface_admin.editeGym', compact('gym'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $gym= gym::find($id);
        $gym->nom_gym = $request->nom_gym;
        $gym->photo_gym = $request->photo_gym;
        $gym->adresse_gym = $request->adresse_gym;
        $gym->localisation_gym = $request->localisation_gym;

        $validator= Validator::make($request->all(),[
            'nom_gym'=>'required',
            'photo_gym'=>'required|image',
            'adresse_gym'=>'required',
            'localisation_gym'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_gym');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/gym/', $filename);

                $gym->update([
                    'nom_gym'=>$request->nom_gym,
                    'photo_gym'=>$filename,
                    'adresse_gym'=>$request->adresse_gym,
                    'localisation_gym'=>$request->localisation_gym,
                ]);
            return redirect()->route('admin.listeGym')->with('success', "enregistrement avec success");
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
        $gym= gym::find($id);
        $gym->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Gym($id){
        $gym =  gym::find($id);

        $gym->status_gym = 1;

        $gym->update();

        return redirect()->back()->with('status_gym', 'Gym '.$gym->nom_gym.' a été activé avec succès');
    }

    public function desactiver_Gym($id){
        $gym =  gym::find($id);

        $gym->status_gym  = 0;

        $gym->update();

        return redirect()->back()->with('status_gym', 'gym '.$gym->nom_gym.' a été desactiver avec succès');
    }
}
