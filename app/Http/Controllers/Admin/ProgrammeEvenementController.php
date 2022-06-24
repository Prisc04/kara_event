<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\programme_evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgrammeEvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programme_evenements = programme_evenement::all();
        return view('interface_admin.listeprogramme',compact('programme_evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterprogramme');
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
            'jour_programme'=>'required',
            'date_programme'=>'required',
            'heure_programme'=>'required',
            'match_programme'=>'required',
            'lieu_programme'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

                programme_evenement::create([
                    'jour_programme'=>$request->jour_programme,
                    'date_programme'=>$request->date_programme,
                    'heure_programme'=>$request->heure_programme,
                    'match_programme'=>$request->match_programme,
                    'lieu_programme'=>$request->lieu_programme,
                ]);

                return redirect()->route('admin.listeprogramme')->with('success', "enregistrement avec success");

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
        $programme_evenement= programme_evenement::find($id);
        return view('interface_admin.editeprogramme', compact('programme_evenement'));
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
        $programme_evenement= programme_evenement::find($id);
        $programme_evenement->jour_programme = $request->jour_programme;
        $programme_evenement->date_programme = $request->date_programme;
        $programme_evenement->heure_programme = $request->heure_programme;
        $programme_evenement->match_programme = $request->match_programme;
        $programme_evenement->lieu_programme = $request->lieu_programme;

        $validator= Validator::make($request->all(),[
            'jour_programme'=>'required',
            'date_programme'=>'required',
            'heure_programme'=>'required',
            'match_programme'=>'required',
            'lieu_programme'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $programme_evenement->update([
                'jour_programme'=>$request->jour_programme,
                'date_programme'=>$request->date_programme,
                'heure_programme'=>$request->heure_programme,
                'match_programme'=>$request->match_programme,
                'lieu_programme'=>$request->lieu_programme,

            ]);
            $programme_evenement->save();
            return redirect()->route('admin.listeprogramme')->with('success', "enregistrement avec success");

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
        $programme_evenement= programme_evenement::find($id);
        $programme_evenement->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_programme($id){
        $programme_evenement =  programme_evenement::find($id);

        $programme_evenement->status_programme = 1;

        $programme_evenement->update();

        return redirect()->back()->with('status_programme', 'le programme evenement '.$programme_evenement->match_programme.' a été activé avec succès');
    }

    public function desactiver_programme($id){
        $programme_evenement =  programme_evenement::find($id);

        $programme_evenement->status_programme = 0;

        $programme_evenement->update();

        return redirect()->back()->with('status_programme', 'le programme evenement '.$programme_evenement->match_programme.' a été desactiver avec succès');
    }
}
