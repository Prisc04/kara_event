<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\lutteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;

class LutteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lutteurs = lutteur::all();
        return view('interface_admin.listelutteur',compact('lutteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterlutteur');
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
            'nom_lutteur'=>'required',
            'prenom_lutteur'=>'required',
            'photo_lutteur'=>'required|image',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='/file';
            $file=$request->file('photo_lutteur');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){
                lutteur::create([
                    'nom_lutteur'=>$request->nom_lutteur,
                    'prenom_lutteur'=>$request->prenom_lutteur,
                    'photo_lutteur'=>$file_name,
                ]);
                return redirect()->route('admin.listelutteur')->with('success', "enregistrement avec success");
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
        $lutteur= lutteur::find($id);
        return view('interface_admin.editlutteur', compact('lutteur'));
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


            $lutteur= lutteur::find($id);
            $lutteur->nom_lutteur = $request->nom_lutteur;
            $lutteur->prenom_lutteur = $request->prenom_lutteur;

            $validator= Validator::make($request->all(),[
                'nom_lutteur'=>'required',
                'prenom_lutteur'=>'required',
                'photo_lutteur'=>'required|image',
            ]);

            if(!$validator){
                return redirect()->back()->with('fail', "echec d'enregistrement");
            }else{

                $path ='/file';
                $file=$request->file('photo_lutteur');
                $file_name = time().'_'.$file->getClientOriginalName();
                $upload = $file->storeAs($path, $file_name, 'public');
                $destination = '/file/'.$lutteur->photo_lutteur;
                if (File::exists($destination)){
                    File::delete($destination);
                }
                if($upload){
                    $lutteur->update([
                        'nom_lutteur'=>$request->nom_lutteur,
                        'prenom_lutteur'=>$request->prenom_lutteur,
                        'photo_lutteur'=>$file_name,
                    ]);
                    $lutteur->save();
                    return redirect()->route('admin.listelutteur')->with('success', "enregistrement avec success");
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
        //
        $lutteur= lutteur::find($id);
        $lutteur->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");

    }


    public function activer_lutteur($id){
        $lutteur =  lutteur::find($id);

        $lutteur->status_lutteur = 1;

        $lutteur->update();

        return redirect()->back()->with('status_lutteur', 'le lutteur '.$lutteur->nom_lutteur.' a été activé avec succès');
    }

    public function desactiver_lutteur($id){
        $lutteur =  lutteur::find($id);

        $lutteur->status_lutteur = 0;

        $lutteur->update();

        return redirect()->back()->with('status_lutteur', 'le lutteur '.$lutteur->nom_lutteur.' a été desactiver avec succès');
    }
}
