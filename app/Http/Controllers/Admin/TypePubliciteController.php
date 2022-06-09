<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\type_publicite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypePubliciteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_publicites = type_publicite::all();
        return view('interface_admin.listetypepublicite',compact('type_publicites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajoutertypepublicite');

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

            'nom_type_publicite'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

                type_publicite::create([

                    'nom_type_publicite'=>$request->nom_type_publicite,

                ]);

                return redirect()->route('admin.listetypepublicite')->with('success', "enregistrement avec success");

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
        $type_publicite=  type_publicite::find($id);
        return view('interface_admin.editetypepublicite', compact('type_publicite'));
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
        $type_publicite= type_publicite::find($id);
        $type_publicite->nom_type_publicite = $request->nom_type_publicite;

        $validator= Validator::make($request->all(),[

            'nom_type_publicite'=>'required',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $type_publicite->update([

                'nom_type_publicite'=>$request->nom_type_publicite,

            ]);
            $type_publicite->save();
            return redirect()->route('admin.listetypepublicite')->with('success', "enregistrement avec success");

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
        $type_publicite= type_publicite::find($id);
        $type_publicite->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");

    }

    public function activer_typepublicite($id){
        $type_publicite =  type_publicite::find($id);

        $type_publicite->status_publicite = 1;

        $type_publicite->update();

        return redirect()->back()->with('status_publicite', 'le type publicite '.$type_publicite->nom_type_publicite.' a été activé avec succès');
    }

    public function desactiver_typepublicite($id){

        $type_publicite =  type_publicite::find($id);

        $type_publicite->status_publicite = 0;

        $type_publicite->update();

        return redirect()->back()->with('status_publicite', 'le type publicite '.$type_publicite->nom_type_publicite.' a été desactiver avec succès');
    }
}
