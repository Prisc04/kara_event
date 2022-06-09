<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pub;
use Illuminate\Http\Request;
use App\Models\type_publicite;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class PubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pubs = pub::all();
        return view('interface_admin.listepublicite',compact('pubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $typepublicites = type_publicite::all();
        return view('interface_admin.ajouterpublicite',compact('typepublicites'));
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
            'nom_societe'=>'required',
            'photo_publicite'=>'required|image',
            'type_publicite_id'=>'required',
            'description_publicite'=>'required',
            'date_debut_publicite'=>'required',
            'date_fin_publicite'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='/file';
            $file=$request->file('photo_publicite');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){
                pub::create([
                    'nom_societe'=>$request->nom_societe,
                    'photo_publicite'=>$file_name,
                    'type_publicite_id'=>$request->type_publicite_id,
                    'description_publicite'=>$request->description_publicite,
                    'date_debut_publicite'=>$request->date_debut_publicite,
                    'date_fin_publicite'=>$request->date_fin_publicite,

                ]);
                return redirect()->route('admin.listepublicite')->with('success', "enregistrement avec success");
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
        $typepublicites = type_publicite::all();
        $pub= pub::find($id);
        return view('interface_admin.editepublicite', compact('pub','typepublicites'));
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
        $pub= pub::find($id);

        $validator= Validator::make($request->all(),[

            'nom_societe'=>'required',
            'photo_publicite'=>'required|image',
            'type_publicite_id'=>'required',
            'description_publicite'=>'required',
            'date_debut_publicite'=>'required',
            'date_fin_publicite'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $path ='/file';
            $file=$request->file('photo_publicite');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');
            $destination = '/file/'.$pub->photo_publicite;
            if (File::exists($destination)){
                File::delete($destination);
            }
            if($upload){
                $pub->update([
                    'nom_societe'=>$request->nom_societe,
                    'photo_publicite'=>$file_name,
                    'type_publicite_id'=>$request->type_publicite_id,
                    'description_publicite'=>$request->description_publicite,
                    'date_debut_publicite'=>$request->date_debut_publicite,
                    'date_fin_publicite'=>$request->date_fin_publicite,
                ]);
                $pub->save();
                return redirect()->route('admin.listepublicite')->with('success', "enregistrement avec success");
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
        $pub= pub::find($id);
        $pub->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_publicite($id){
        $pub =  pub::find($id);

        $pub->status_publicite = 1;

        $pub->update();

        return redirect()->back()->with('status_publicite', 'la publicite '.$pub->nom_societe.' a été activé avec succès');
    }

    public function desactiver_publicite($id){
        $pub =  pub::find($id);

        $pub->status_publicite = 0;

        $pub->update();

        return redirect()->back()->with('status_publicite', 'la publicite '.$pub->nom_societe.' a été desactiver avec succès');
    }
}
