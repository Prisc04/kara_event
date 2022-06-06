<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\type_article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_articles = type_article::all();
        return view('interface_admin.listetypearticle',compact('type_articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajoutertypearticle');
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
            'libelle_type_article'=>'required',
            'description_type_article'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

                type_article::create([
                    'libelle_type_article'=>$request->libelle_type_article,
                    'description_type_article'=>$request->description_type_article,
                ]);

                return redirect()->route('admin.listetypearticle')->with('success', "enregistrement avec success");

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
        $type_article= type_article::find($id);
        return view('interface_admin.editetypearticle', compact('type_article'));
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
        $type_article= type_article::find($id);
        $type_article->libelle_type_article = $request->libelle_type_article;
        $type_article->description_type_article = $request->description_type_article;

        $validator= Validator::make($request->all(),[
            'libelle_type_article'=>'required',
            'description_type_article'=>'required',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $type_article->update([
                'libelle_type_article'=>$request->libelle_type_article,
                'description_type_article'=>$request->description_type_article,

            ]);
            $type_article->save();
            return redirect()->route('admin.listetypearticle')->with('success', "enregistrement avec success");

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
        $type_article= type_article::find($id);
        $type_article->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_typearticle($id){
        $type_article =  type_article::find($id);

        $type_article->status_type_article = 1;

        $type_article->update();

        return redirect()->back()->with('status_type_article', 'le type article '.$type_article->libelle_type_article.' a été activé avec succès');
    }

    public function desactiver_typearticle($id){
        $type_article =  type_article::find($id);

        $type_article->status_type_article = 0;

        $type_article->update();

        return redirect()->back()->with('status_type_article', 'le type article '.$type_article->libelle_type_article.' a été desactiver avec succès');
    }
}
