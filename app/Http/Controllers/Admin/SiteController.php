<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\site_touristique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $site_touristiques = site_touristique::all();
        return view('interface_admin.listeSite',compact('site_touristiques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterSite');
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
        $site_touristique = new site_touristique() ;

        $site_touristique->nom_site = $request->input('nom_site');
        $site_touristique->description_site = $request->input('description_site');
        $site_touristique->localisation_site = $request->input('localisation_site');

        if($request->hasfile('photo_site')){
            $file = $request->file('photo_site');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/site/', $filename);
            $site_touristique->photo_site = $filename;
        }
        $site_touristique->save();
        return redirect()->route('admin.listeSite')->with('success', "enregistrement avec success");
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
        $site_touristique= site_touristique::find($id);
        return view('interface_admin.editeSite', compact('site_touristique'));
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
        $site_touristique= site_touristique::find($id);

        $site_touristique->nom_site = $request->nom_site;
        $site_touristique->description_site = $request->description_site;
        $site_touristique->localisation_site = $request->localisation_site;

        $validator= Validator::make($request->all(),[
            'nom_site'=>'required',
            'description_site'=>'required',
            'localisation_site'=>'required',
            'photo_site'=>'required|image',
        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_site');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/site/', $filename);


                $site_touristique->update([
                    'nom_site'=>$request->nom_site,
                    'description_site'=>$request->description_site,
                    'localisation_site'=>$request->localisation_site,
                    'photo_site'=>$filename,
                ]);
            return redirect()->route('admin.listeSite')->with('success', "enregistrement avec success");
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
        $site_touristique= site_touristique::find($id);
        $site_touristique->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Site($id){
        $site_touristique = site_touristique::find($id);

        $site_touristique->status_site = 1;

        $site_touristique->update();

        return redirect()->back()->with('status_site', 'le site touristique '.$site_touristique->nom_site.' a été activé avec succès');
    }

    public function desactiver_Site($id){
        $site_touristique =  site_touristique::find($id);

        $site_touristique->status_site = 0;

        $site_touristique->update();

        return redirect()->back()->with('status_site', 'le site touristique '.$site_touristique->nom_site.' a été desactiver avec succès');
    }
}
