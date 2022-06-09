<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\type_article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = article::all();
        return view('interface_admin.listearticle',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $typearticles = type_article::all();
        return view('interface_admin.ajouterarticle',compact('typearticles'));
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
            'photo_article'=>'required|image',
            'type_article_id'=>'required',
            'nom_article'=>'required',
            'desciption_article'=>'required',
            'prix_article'=>'required',

        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='file/';
            $file=$request->file('photo_article');
            $file_name = "images/".time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){
                article::create([
                    'photo_article'=>$file_name,
                    'type_article_id'=>$request->type_article_id,
                    'nom_article'=>$request->nom_article,
                    'desciption_article'=>$request->desciption_article,
                    'prix_article'=>$request->prix_article,
                ]);
                return redirect()->route('admin.listearticle')->with('success', "enregistrement avec success");
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
        $typearticles = type_article::all();
        $article= article::find($id);
        return view('interface_admin.editearticle', compact('article','typearticles'));
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
        $article= article::find($id);

        $validator= Validator::make($request->all(),[
            'photo_article'=>'required|image',
            'type_article_id'=>'required',
            'nom_article'=>'required',
            'desciption_article'=>'required',
            'prix_article'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $path ='/file';
            $file=$request->file('photo_article');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');
            $destination = '/file/'.$article->photo_article;
            if (File::exists($destination)){
                File::delete($destination);
            }
            if($upload){
                $article->update([
                    'photo_article'=>$file_name,
                    'type_article_id'=>$request->type_article_id ,
                    'nom_article'=>$request->nom_article,
                    'desciption_article'=>$request->desciption_article,
                    'prix_article'=>$request->prix_article,

                ]);
                $article->save();
                return redirect()->route('admin.listearticle')->with('success', "enregistrement avec success");
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
        $article= article::find($id);
        $article->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");

    }

    public function activer_article($id){
        $article =  article::find($id);

        $article->status_article = 1;

        $article->update();

        return redirect()->back()->with('status_article', 'le article '.$article->nom_article.' a été activé avec succès');
    }

    public function desactiver_article($id){
        $article =  article::find($id);

        $article->status_article = 0;

        $article->update();

        return redirect()->back()->with('status_article', 'le article '.$article->nom_article.' a été desactiver avec succès');
    }
}
