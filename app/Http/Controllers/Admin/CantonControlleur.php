<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\canton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CantonControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cantons = canton::all();
        return view('interface_admin.listecanton',compact('cantons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // creer canton
        return view('interface_admin.ajoutercanton');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $canton = new canton ;
        $canton->nom_canton = $request->input('nom_canton');
        $canton->description_canton = $request->input('description_canton');

        if($request->hasfile('image_canton')){
            $file = $request->file('image_canton');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/canton/', $filename);
            $canton->photo_canton = $filename;
        }
        $canton->save();
        return redirect()->route('admin.listecanton')->with('success', "enregistrement avec success");
    }

      /*
        public function store(Request $request)
    {
        // dd($request->all());
        $validator= Validator::make($request->all(),[
            'nom_canton'=>'required',
            'description_canton'=>'required',
            'image_canton'=>'required|image',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='files/';
            $file=$request->file('image_canton');
            $file_name = "images/".time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){

                canton::create([
                    'nom_canton'=>$request->nom_canton,
                    'description_canton'=>$request->description_canton,
                    'photo_canton'=>$file_name,
                ]);
                return redirect()->route('admin.listecanton')->with('success', "enregistrement avec success");
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
        $canton= canton::find($id);
        return view('interface_admin.editcanton', compact('canton'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*
    public function update(Request $request, $id)
    {
        $canton= canton::find($id);
        $canton->nom_canton = $request->nom_canton;
        $canton->description_canton = $request->description_canton;

        $validator= Validator::make($request->all(),[
            'nom_canton'=>'required',
            'description_canton'=>'required',
            'image_canton'=>'required|image',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $path ='/file';
             $file = $request->file('image_canton');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/canton/', $filename);
            $canton->photo_canton = $filename;
            if($upload){

                $canton->update([
                    'nom_canton'=>$request->nom_canton,
                    'description_canton'=>$request->description_canton,
                    'photo_canton'=>$file_name,
                ]);
                $canton->save();
                return redirect()->route('admin.listecanton')->with('success', "enregistrement avec success");
            }
        }

    }
    */

    public function update(Request $request, $id){
        $canton= canton::find($id);
        $canton->nom_canton = $request->nom_canton;
        $canton->description_canton = $request->description_canton;

        $validator= Validator::make($request->all(),[
            'nom_canton'=>'required',
            'description_canton'=>'required',
            'image_canton'=>'required|image',
        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('image_canton');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/canton/', $filename);


                $canton->update([
                    'nom_canton'=>$request->nom_canton,
                    'description_canton'=>$request->description_canton,
                    'photo_canton'=>$filename,
                ]);
            return redirect()->route('admin.listecanton')->with('success', "enregistrement avec success");
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
        $canton= canton::find($id);
        $canton->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");

    }

    public function activer_canton($id){
        $canton =  canton::find($id);

        $canton->status_canton = 1;

        $canton->update();

        return redirect()->back()->with('status_canton', 'le canton '.$canton->nom_canton.' a été activé avec succès');
    }

    public function desactiver_canton($id){
        $canton =  canton::find($id);

        $canton->status_canton = 0;

        $canton->update();

        return redirect()->back()->with('status_canton', 'le canton '.$canton->nom_canton.' a été desactiver avec succès');
    }


}
