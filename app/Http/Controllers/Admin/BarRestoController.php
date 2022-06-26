<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bar_resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class BarRestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bar_restos = bar_resto::all();
        return view('interface_admin.listeBarResto',compact('bar_restos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterBarResto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $bar_resto = new bar_resto() ;
        $bar_resto->nom_bar_resto = $request->input('nom_bar_resto');
        $bar_resto->photo_bar_resto = $request->input('photo_bar_resto');
        $bar_resto->adresse_bar_resto = $request->input('adresse_bar_resto');
        $bar_resto->localisation_bar_resto = $request->input('localisation_bar_resto');
        $bar_resto->description_bar_resto = $request->input('description_bar_resto');
        $bar_resto->contact_bar_resto = $request->input('contact_bar_resto');
        $bar_resto->email_bar_resto = $request->input('email_bar_resto');
        $bar_resto->whatsapp_bar_resto = $request->input('whatsapp_bar_resto');
        $bar_resto->site_bar_resto = $request->input('site_bar_resto');

        if($request->hasfile('photo_bar_resto')){
            $file = $request->file('photo_bar_resto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/barResto/', $filename);
            $bar_resto->photo_bar_resto = $filename;
        }
        $bar_resto->save();
        return redirect()->route('admin.listeBarResto')->with('success', "enregistrement avec success");
    }

    /*
    public function store(Request $request)
    {
        //
        $validator= Validator::make($request->all(),[
            'nom_bar_resto'=>'required',
            'photo_bar_resto'=>'required|image',
            'adresse_bar_resto'=>'required',
            'localisation_bar_resto'=>'required',
            'description_bar_resto'=>'required',
            'contact_bar_resto'=>'required',
            'email_bar_resto'=>'required',
            'whatsapp_bar_resto'=>'required',
            'site_bar_resto'=>'required',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='files/';
            $file=$request->file('photo_bar_resto');
            $file_name = "images/".time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){
                bar_resto::create([
                    'nom_bar_resto'=>$request->nom_bar_resto,
                    'photo_bar_resto'=>$file_name,
                    'adresse_bar_resto'=>$request->adresse_bar_resto,
                    'localisation_bar_resto'=>$request->localisation_bar_resto,
                    'description_bar_resto'=>$request->description_bar_resto,
                    'contact_bar_resto'=>$request->contact_bar_resto,
                    'email_bar_resto'=>$request->email_bar_resto,
                    'whatsapp_bar_resto'=>$request->whatsapp_bar_resto,
                    'site_bar_resto'=>$request->site_bar_resto,

                ]);
                return redirect()->route('admin.listeBarResto')->with('success', "enregistrement avec success");
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
        $bar_resto= bar_resto::find($id);
        return view('interface_admin.editeBarResto', compact('bar_resto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $bar_resto= bar_resto::find($id);
        $bar_resto->nom_bar_resto = $request->nom_bar_resto;
        $bar_resto->photo_bar_resto = $request->photo_bar_resto;
        $bar_resto->adresse_bar_resto = $request->adresse_bar_resto;
        $bar_resto->localisation_bar_resto = $request->localisation_bar_resto;
        $bar_resto->description_bar_resto = $request->description_bar_resto;
        $bar_resto->contact_bar_resto = $request->contact_bar_resto;
        $bar_resto->email_bar_resto = $request->email_bar_resto;
        $bar_resto->whatsapp_bar_resto = $request->whatsapp_bar_resto;
        $bar_resto->site_bar_resto = $request->sitebar_resto;

        $validator= Validator::make($request->all(),[
            'nom_bar_resto'=>'required',
            'photo_bar_resto'=>'required|image',
            'adresse_bar_resto'=>'required',
            'localisation_bar_resto'=>'required',
            'description_bar_resto'=>'required',
            'contact_bar_resto'=>'required',
            'email_bar_resto'=>'required',
            'whatsapp_bar_resto '=>'required',
            'site_bar_resto'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_bar_resto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/barResto/', $filename);


                $bar_resto->update([
                    'nom_bar_resto'=>$request->nom_bar_resto,
                    'photo_bar_resto'=>$filename,
                    'adresse_bar_resto'=>$request->adresse_bar_resto,
                    'localisationbar_resto'=>$request->localisation_bar_resto,
                    'description_bar_resto'=>$request->description_bar_resto,
                    'contact_bar_resto'=>$request->contact_bar_resto,
                    'email_bar_resto'=>$request->email_bar_resto,
                    'whatsapp_bar_resto'=>$request->whatsapp_bar_resto,
                    'site_bar_resto'=>$request->site_bar_resto,
                ]);
            return redirect()->route('admin.listeBarResto')->with('success', "enregistrement avec success");
        }
    }

    /*
    public function update(Request $request, $id)
    {
        //
        $bar_resto= bar_resto::find($id);
        $bar_resto->nom_bar_resto= $request->nom_bar_resto;
        $bar_resto->adresse_bar_resto = $request->adresse_bar_resto;
        $bar_resto->localisation_bar_resto = $request->localisation_bar_resto;
        $bar_resto->description_bar_resto = $request->description_bar_resto;
        $bar_resto->contact_bar_resto = $request->contact_bar_resto;
        $bar_resto->email_bar_resto = $request->email_bar_resto;
        $bar_resto->whatsapp_bar_resto = $request->whatsapp_bar_resto;
        $bar_resto->site_bar_resto = $request->site_bar_resto;

        $validator= Validator::make($request->all(),[

            'nom_bar_resto'=>'required',
            'photo_bar_resto'=>'required|image',
            'adresse_bar_resto'=>'required',
            'localisation_bar_resto'=>'required',
            'description_bar_resto'=>'required',
            'contact_bar_resto'=>'required',
            'email_bar_resto'=>'required',
            'whatsapp_bar_resto'=>'required',
            'site_bar_resto'=>'required',
        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='/files';
            $file=$request->file('photo_bar_resto');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');
            $destination = '/file/'.$bar_resto->photo_bar_resto;
            if (File::exists($destination)){
                File::delete($destination);
            }
            if($upload){
                $bar_resto->update([
                    'nom_bar_resto'=>$request->nom_bar_resto,
                    'photo_bar_resto'=>$file_name,
                    'adresse_bar_resto'=>$request->adresse_bar_resto,
                    'localisation_bar_resto'=>$request->localisation_bar_resto,
                    'description_bar_resto'=>$request->description_bar_resto,
                    'contact_bar_resto'=>$request->contact_bar_resto,
                    'email_bar_resto'=>$request->email_bar_resto,
                    'whatsapp_bar_resto'=>$request->whatsapp_bar_resto,
                    'site_bar_resto'=>$request->site_bar_resto,
                ]);
                $bar_resto->save();
                return redirect()->route('admin.listeBarResto')->with('success', "enregistrement avec success");
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
        $bar_resto= bar_resto::find($id);
        $bar_resto->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_BarResto($id){
        $bar_resto =  bar_resto::find($id);

        $bar_resto->status_bar_resto = 1;

        $bar_resto->update();

        return redirect()->back()->with('status_bar_resto', 'bar_resto '.$bar_resto->nom_bar_resto.' a été activé avec succès');
    }

    public function desactiver_BarResto($id){
        $bar_resto =  bar_resto::find($id);

        $bar_resto->status_bar_resto = 0;

        $bar_resto->update();

        return redirect()->back()->with('status_bar_resto', 'bar_resto'.$bar_resto->nom_bar_resto.' a été desactiver avec succès');
    }
}
