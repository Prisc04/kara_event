<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $evenements = evenement::all();
        return view('interface_admin.listeEvenement',compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterEvenement');
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
            'libelle_event'=>'required',
            'date_debut_event'=>'required',
            'date_fin_event'=>'required',
            'photo_event'=>'required|image',
            'description_event'=>'required',
        ]);

        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='/file';
            $file=$request->file('photo_event');
            $file_name = time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){

                evenement::create([
                    'libelle_event'=>$request->libelle_event,
                    'date_debut_event'=>$request->date_debut_event,
                    'date_fin_event'=>$request->date_fin_event,
                    'description_event'=>$request->description_event,
                    'photo_event'=>$file_name,
                ]);
                return redirect()->route('admin.listeEvenement')->with('success', "enregistrement avec success");
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
        $evenement= evenement::find($id);
        return view('interface_admin.editevenement', compact('evenement'));
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

        {
            $evenement= evenement::find($id);
            $evenement->libelle_event = $request->libelle_event;
            $evenement->date_debut_event = $request->date_debut_event;
            $evenement->date_fin_event = $request->date_fin_event;
            $evenement->description_event = $request->description_event;

            $validator= Validator::make($request->all(),[
                'libelle_event'=>'required',
                'date_debut_event'=>'required',
                'date_fin_event'=>'required',
                'description_event'=>'required',
                'photo_event'=>'required|image',
            ]);

            if(!$validator){
                return redirect()->back()->with('fail', "echec d'enregistrement");
            }else{

                $path ='/file';
                $file=$request->file('image_canton');
                $file_name = time().'_'.$file->getClientOriginalName();
                $upload = $file->storeAs($path, $file_name, 'public');
                $destination = '/file/'.$evenement->photo_event;
                if (File::exists($destination)){
                    File::delete($destination);
                }
                if($upload){
                    $evenement->update([
                        'libelle_event'=>$request->libelle_event,
                        'date_debut_event'=>$request->date_debut_event,
                        'date_fin_event'=>$request->date_fin_event,
                        'description_event'=>$request->description_event,
                        'photo_event'=>$file_name,
                    ]);
                    $evenement->save();
                    return redirect()->route('admin.listeEvenement')->with('success', "enregistrement avec success");
                }
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
        {
            $evenement= evenement::find($id);
            $evenement->delete();
            return redirect()->back()->with('success', "vous avez supprimé avec success");

        }
    }

    public function activer_evenement($id){
        $evenement =  evenement::find($id);

        $evenement->status_evenement = 1;

        $evenement->update();

        return redirect()->back()->with('status_event', 'les évènements '.$evenement->libelle_event.' a été activé avec succès');
    }

    public function desactiver_evenement($id){
        $evenement =  evenement::find($id);

        $evenement->status_event = 0;

        $evenement->update();

        return redirect()->back()->with('status_event', 'les évènements '.$evenement->libelle_event.' a été desactiver avec succès');
    }
}
