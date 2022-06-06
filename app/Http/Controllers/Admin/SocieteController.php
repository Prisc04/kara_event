<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $societes = societe::all();
        return view('interface_admin.listesociete',compact('societes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajoutersociete');
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
            'raison_social'=>'required',
            'adresse_societe'=>'required',
            'numero_societe'=>'required',
            'email_societe'=>'required|email|unique:societes,email_societe',
            'nif_societe'=>'required',
            'rccm_societe'=>'required',
            'logo_societe'=>'required|image',
            'photo_societe'=>'required|image',
            'note_societe'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='/file';
            $file_photo=$request->file('photo_societe');
            $file_logo=$request->file('logo_societe');
            $file_name_photo = time().'_'.$file_photo->getClientOriginalName();
            $file_name_logo = time().'_'.$file_logo->getClientOriginalName();

            $upload_photo = $file_photo->storeAs($path, $file_name_photo, 'public');
            $upload_logo = $file_logo->storeAs($path, $file_name_logo, 'public');

            if($upload_logo || $upload_photo){


                societe::create([
                    'raison_social'=>$request->raison_social,
                    'adresse_societe'=>$request->adresse_societe,
                    'numero_societe'=>$request->numero_societe,
                    'email_societe'=>$request->email_societe,
                    'nif_societe'=>$request->nif_societe,
                    'rccm_societe'=>$request->rccm_societe,
                    'logo_societe'=>$file_name_logo,
                    'photo_societe'=>$file_name_photo,
                    'note_societe'=>$request->note_societe,

                ]);
                return redirect()->route('admin.listesociete')->with('success', "enregistrement avec success");
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

    public function getSocieteById($id)
    {

    }
    public function edit($id)
    {
        $societe= societe::find($id);
        return view('interface_admin.editsociete', compact('societe'));
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
        $societe= societe::find($id);

        $validator= Validator::make($request->all(),[
            'raison_social'=>'required',
            'adresse_societe'=>'required',
            'numero_societe'=>'required',
            'email_societe'=>'required|email|unique:societes,email_societe',
            'nif_societe'=>'required',
            'rccm_societe'=>'required',
            'logo_societe'=>'required|image',
            'photo_societe'=>'required|image',
            'note_societe'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='/file';
            $file_photo=$request->file('photo_societe');
            $file_logo=$request->file('logo_societe');
            $file_name_photo = "images/".time().'_'.$file_photo->getClientOriginalName();
            $file_name_logo = "images/".time().'_'.$file_logo->getClientOriginalName();

            $upload_photo = $file_photo->storeAs($path, $file_name_photo, 'public');
            $upload_logo = $file_logo->storeAs($path, $file_name_logo, 'public');

            if($upload_logo || $upload_photo){


                $societe->update([
                    'raison_social'=>$request->raison_social,
                    'adresse_societe'=>$request->adresse_societe,
                    'numero_societe'=>$request->numero_societe,
                    'email_societe'=>$request->email_societe,
                    'nif_societe'=>$request->nif_societe,
                    'rccm_societe'=>$request->rccm_societe,
                    'logo_societe'=>$file_name_logo,
                    'photo_societe'=>$file_name_photo,
                    'note_societe'=>$request->note_societe,

                ]);
                $societe->save();
                return redirect()->route('admin.listesociete')->with('success', "enregistrement avec success");
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $societe= societe::find($id);
        $societe->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_societe($id){
        $societe =  societe::find($id);

        $societe->status_societe = 1;

        $societe->update();

        return redirect()->back()->with('status_societe', 'la societe '.$societe->nom_societe.' a été activé avec succès');
    }

    public function desactiver_societe($id){
        $societe =  societe::find($id);

        $societe->status_societe = 0;

        $societe->update();

        return redirect()->back()->with('status_societe', 'la societe '.$societe->nom_societe.' a été desactiver avec succès');
    }
}
