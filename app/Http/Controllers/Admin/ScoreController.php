<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $scores = score::all();
        return view('interface_admin.listeScore',compact('scores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterScore');
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
            'nom_canton1'=>'required',
            'point_score1'=>'required',
            'nom_canton2'=>'required',
            'point_score2'=>'required',
        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            score::create([
                'nom_canton1'=>$request->nom_canton1,
                'point_score1'=>$request->point_score1,
                'nom_canton2'=>$request->nom_canton2,
                'point_score2'=>$request->point_score2,
            ]);

            return redirect()->route('admin.listeScore')->with('success', "enregistrement avec success");
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
        $score= score::find($id);
        return view('interface_admin.editeScore', compact('score'));
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
        $score= score::find($id);
        $score->nom_canton1 = $request->nom_canton1;
        $score->point_score1 = $request->point_score1;
        $score->nom_canton2 = $request->nom_canton2;
        $score->point_score2 = $request->point_score2;

        $validator= Validator::make($request->all(),[
            'nom_canton1'=>'required',
            'point_score1'=>'required',
            'nom_canton2'=>'required',
            'point_score2'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $score->update([
                'nom_canton1'=>$request->nom_canton1,
                'point_score1'=>$request->point_score1,
                'nom_canton2'=>$request->nom_canton2,
                'point_score2'=>$request->point_score2,
            ]);
            $score->save();
            return redirect()->route('admin.listeScore')->with('success', "enregistrement avec success");

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
        $score= score::find($id);
        $score->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_Score($id){
        $score =  score::find($id);

        $score->status_score = 1;

        $score->update();

        return redirect()->back()->with('status_score', 'lescore '.$score->nom_canton.' a été activé avec succès');
    }

    public function desactiver_Score($id){
        $score =  score::find($id);

        $score->status_score = 0;

        $score->update();

        return redirect()->back()->with('status_score', 'le score '.$score->nom_canton.' a été desactiver avec succès');
    }
}
