<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PharmacieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pharmacies = pharmacie::all();
        return view('interface_admin.listePharmacie',compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterpharmacie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $pharmacie = new pharmacie() ;
        $pharmacie->nom_pharmacie = $request->input('nom_pharmacie');
        $pharmacie->photo_pharmacie = $request->input('photo_pharmacie');
        $pharmacie->adresse_pharmacie = $request->input('adresse_pharmacie');
        $pharmacie->localisation_pharmacie = $request->input('localisation_pharmacie');
        $pharmacie->contact_pharmacie = $request->input('contact_pharmacie');
        if($request->hasfile('photo_pharmacie')){
            $file = $request->file('photo_pharmacie');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/pharmacie/', $filename);
            $pharmacie->photo_pharmacie = $filename;
        }
        $pharmacie->save();
        return redirect()->route('admin.listePharmacie')->with('success', "enregistrement avec success");
    }


     /*
    public function store(Request $request)
    {
        //
        $validator= Validator::make($request->all(),[
            'nom_pharmacie'=>'required',
            'photo_pharmacie'=>'required|image',
            'adresse_pharmacie'=>'required',
            'localisation_pharmacie'=>'required',
            'contact_pharmacie'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='files/';
            $file=$request->file('photo_pharmacie');
            $file_name = "images/".time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){
                pharmacie::create([
                    'nom_pharmacie'=>$request->nom_pharmacie,
                    'photo_pharmacie'=>$file_name,
                    'adresse_pharmacie'=>$request->adresse_pharmacie,
                    'localisation_pharmacie'=>$request->localisation_pharmacie,
                    'contact_pharmacie'=>$request->contact_pharmacie,
                ]);
                return redirect()->route('admin.listePharmacie')->with('success', "enregistrement avec success");
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
        $pharmacie= pharmacie::find($id);
        return view('interface_admin.editePharmacie', compact('pharmacie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $pharmacie= pharmacie::find($id);
        $pharmacie->nom_pharmacie = $request->nom_pharmacie;
        $pharmacie->photo_pharmacie = $request->photo_pharmacie;
        $pharmacie->adresse_pharmacie = $request->adresse_pharmacie;
        $pharmacie->localisation_pharmacie = $request->localisation_pharmacie;
        $pharmacie->contact_pharmacie = $request->contact_pharmacie;

        $validator= Validator::make($request->all(),[
            'nom_pharmacie'=>'required',
            'photo_pharmacie'=>'required|image',
            'adresse_pharmacie'=>'required',
            'localisation_pharmacie'=>'required',
            'contact_pharmacie'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_pharmacie');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/pharmacie/', $filename);


                $pharmacie->update([
                    'nom_pharmacie'=>$request->nom_pharmacie,
                    'photo_pharmacie'=>$filename,
                    'adresse_pharmacie'=>$request->adresse_pharmacie,
                    'localisation_pharmacie'=>$request->localisation_pharmacie,
                    'contact_pharmacie'=>$request->contact_pharmacie,
                ]);
            return redirect()->route('admin.listePharmacie')->with('success', "enregistrement avec success");
        }
    }

     /*
    public function update(Request $request, $id)
    {
        //
        $pharmacie= pharmacie::find($id);
        $pharmacie->nom_pharmacie = $request->nom_pharmacie;
        $pharmacie->adresse_pharmacie = $request->adresse_pharmacie;
        $pharmacie->localisation_pharmacie = $request->localisation_pharmacie;
        $pharmacie->contact_pharmacie = $request->contact_pharmacie;

        $validator= Validator::make($request->all(),[
            'nom_pharmacie'=>'required',
            'photo_pharmacie'=>'required|image',
            'adresse_pharmacie'=>'required',
            'localisation_pharmacie'=>'required',
            'contact_pharmacie'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $path ='/files';
            $file=$request->file('photo_pharmacie');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');
            $destination = '/file/'.$pharmacie->pharmacie_hotel;
            if (File::exists($destination)){
                File::delete($destination);
            }
            if($upload){
                $pharmacie->update([
                    'nom_pharmacie'=>$request->nom_pharmacie,
                    'photo_pharmacie'=>$file_name,
                    'adresse_pharmacie'=>$request->adresse_pharmacie,
                    'localisation_pharmacie'=>$request->localisation_pharmacie,
                    'contact_pharmacie'=>$request->contact_pharmacie,
                ]);
                $pharmacie->save();
                return redirect()->route('admin.listePharmacie')->with('success', "enregistrement avec success");
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
        $pharmacie= pharmacie::find($id);
        $pharmacie->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Pharmacie($id){
        $pharmacie =  pharmacie::find($id);

        $pharmacie->status_pharmacie = 1;

        $pharmacie->update();

        return redirect()->back()->with('status_pharmacie', 'pharmacie '.$pharmacie->nom_pharmacie.' a été activé avec succès');
    }

    public function desactiver_Pharmacie($id){
        $pharmacie =  pharmacie::find($id);

        $pharmacie->status_pharmacie = 0;

        $pharmacie->update();

        return redirect()->back()->with('status_pharmacie', 'pharmacie'.$pharmacie->nom_pharmacie.' a été desactiver avec succès');
    }
}
