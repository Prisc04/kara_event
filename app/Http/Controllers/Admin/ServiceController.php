<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = service::all();
        return view('interface_admin.listeService',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterService');
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
        $service = new service() ;

        $service->nom_service = $request->input('nom_service');

        if($request->hasfile('photo_service')){
            $file = $request->file('photo_service');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/service/', $filename);
            $service->photo_service = $filename;
        }
        $service->save();
        return redirect()->route('admin.listeService')->with('success', "enregistrement avec success");
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
        $service= service::find($id);
        return view('interface_admin.editeService', compact('service'));
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
        $service= service::find($id);

        $service->nom_service = $request->nom_service;

        $validator= Validator::make($request->all(),[
            'nom_service'=>'required',
            'photo_service'=>'required|image',
        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_service');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/service/', $filename);

                $service->update([
                    'nom_service'=>$request->nom_service,
                    'photo_service'=>$filename,
                ]);
            return redirect()->route('admin.listeService')->with('success', "enregistrement avec success");
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
        $service= service::find($id);
        $service->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Service($id){
        $service = service::find($id);

        $service->status_service = 1;

        $service->update();

        return redirect()->back()->with('status_service', 'le service '.$service->nom_service.' a été activé avec succès');
    }

    public function desactiver_Service($id){
        $service =  service::find($id);

        $service->status_service = 0;

        $service->update();

        return redirect()->back()->with('status_service', 'le service '.$service->nom_service.' a été desactiver avec succès');
    }

}
