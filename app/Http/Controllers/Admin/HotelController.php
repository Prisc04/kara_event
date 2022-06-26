<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotels = hotel::all();
        return view('interface_admin.listehotel',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interface_admin.ajouterhotel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $hotel = new hotel() ;
        $hotel->nom_hotel = $request->input('nom_hotel');
        $hotel->photo_hotel = $request->input('photo_hotel');
        $hotel->adresse_hotel = $request->input('adresse_hotel');
        $hotel->localisation_hotel = $request->input('localisation_hotel');
        $hotel->description_hotel = $request->input('description_hotel');
        $hotel->contact_hotel = $request->input('contact_hotel');
        $hotel->email_hotel = $request->input('email_hotel');
        $hotel->whatsapp_hotel = $request->input('whatsapp_hotel');
        $hotel->site_hotel = $request->input('site_hotel');

        if($request->hasfile('photo_hotel')){
            $file = $request->file('photo_hotel');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/hotel/', $filename);
            $hotel->photo_hotel = $filename;
        }
        $hotel->save();
        return redirect()->route('admin.listehotel')->with('success', "enregistrement avec success");
    }

    /*

    public function store(Request $request)
    {
        //
        $validator= Validator::make($request->all(),[
            'nom_hotel'=>'required',
            'photo_hotel'=>'required|image',
            'adresse_hotel'=>'required',
            'localisation_hotel'=>'required',
            'description_hotel'=>'required',
            'contact_hotel'=>'required',
            'email_hotel'=>'required',
            'whatsapp_hotel'=>'required',
            'site_hotel'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{
            $path ='files/';
            $file=$request->file('photo_hotel');
            $file_name = "images/".time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if($upload){

                hotel::create([
                    'nom_hotel'=>$request->nom_hotel,
                    'photo_hotel'=>$file_name,
                    'adresse_hotel'=>$request->adresse_hotel,
                    'localisation_hotel'=>$request->localisation_hotel,
                    'description_hotel'=>$request->description_hotel,
                    'contact_hotel'=>$request->contact_hotel,
                    'email_hotel'=>$request->email_hotel,
                    'whatsapp_hotel'=>$request->whatsapp_hotel,
                    'site_hotel'=>$request->site_hotel,

                ]);
                return redirect()->route('admin.listehotel')->with('success', "enregistrement avec success");
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
        $hotel= hotel::find($id);
        return view('interface_admin.editehotel', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $hotel= hotel::find($id);
        $hotel->nom_hotel = $request->nom_hotel;
        $hotel->photo_hotel = $request->photo_hotel;
        $hotel->adresse_hotel = $request->adresse_hotel;
        $hotel->localisation_hotel = $request->localisation_hotel;
        $hotel->description_hotel = $request->description_hotel;
        $hotel->contact_hotel = $request->contact_hotel;
        $hotel->email_hotel = $request->email_hotel;
        $hotel->whatsapp_hotel = $request->whatsapp_hotel;
        $hotel->site_hotel = $request->site_hotel;

        $validator= Validator::make($request->all(),[
            'nom_hotel'=>'required',
            'photo_hotel'=>'required|image',
            'adresse_hotel'=>'required',
            'localisation_hotel'=>'required',
            'description_hotel'=>'required',
            'contact_hotel'=>'required',
            'email_hotel'=>'required',
            'whatsapp_hotel'=>'required',
            'site_hotel'=>'required',

        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $file = $request->file('photo_hotel');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/hotel/', $filename);


                $hotel->update([
                    'nom_hotel'=>$request->nom_hotel,
                    'photo_hotel'=>$filename,
                    'adresse_hotel'=>$request->adresse_hotel,
                    'localisation_hotel'=>$request->localisation_hotel,
                    'description_hotel'=>$request->description_hotel,
                    'contact_hotel'=>$request->contact_hotel,
                    'email_hotel'=>$request->email_hotel,
                    'whatsapp_hotel'=>$request->whatsapp_hotel,
                    'site_hotel'=>$request->site_hotel,
                ]);
            return redirect()->route('admin.listehotel')->with('success', "enregistrement avec success");
        }
    }


     /*
    public function update(Request $request, $id)
    {
        //
        $hotel= hotel::find($id);
        $hotel->nom_hotel = $request->nom_hotel;
        $hotel->adresse_hotel = $request->adresse_hotel;
        $hotel->localisation_hotel = $request->localisation_hotel;
        $hotel->description_hotel = $request->description_hotel;
        $hotel->contact_hotel = $request->contact_hotel;
        $hotel->email_hotel = $request->email_hotel;
        $hotel->whatsapp_hotel = $request->whatsapp_hotel;
        $hotel->site_hotel = $request->site_hotel;

        $validator= Validator::make($request->all(),[
            'nom_hotel'=>'required',
            'photo_hotel'=>'required|image',
            'adresse_hotel'=>'required',
            'localisation_hotel'=>'required',
            'description_hotel'=>'required',
            'contact_hotel'=>'required',
            'email_hotel'=>'required',
            'whatsapp_hotel'=>'required',
            'site_hotel'=>'required',
        ]);
        if(!$validator){
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }else{

            $path ='/files';
            $file=$request->file('photo_hotel');
            $file_name = time().'_'.$file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name, 'public');
            $destination = '/file/'.$hotel->photo_hotel;
            if (File::exists($destination)){
                File::delete($destination);
            }
            if($upload){
                $hotel->update([
                    'nom_hotel'=>$request->nom_hotel,
                    'photo_hotel'=>$file_name,
                    'adresse_hotel'=>$request->adresse_hotel,
                    'localisation_hotel'=>$request->localisation_hotel,
                    'description_hotel'=>$request->description_hotel,
                    'contact_hotel'=>$request->contact_hotel,
                    'email_hotel'=>$request->email_hotel,
                    'whatsapp_hotel'=>$request->whatsapp_hotel,
                    'site_hotel'=>$request->site_hotel,
                ]);
                $hotel->save();
                return redirect()->route('admin.listehotel')->with('success', "enregistrement avec success");
            }
        }
    }

    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hotel= hotel::find($id);
        $hotel->delete();
        return redirect()->back()->with('success', "vous avez supprimé avec success");
    }

    public function activer_hotel($id){
        $hotel =  hotel::find($id);

        $hotel->status_hotel = 1;

        $hotel->update();

        return redirect()->back()->with('status_hotel', 'Hotel '.$hotel->nom_hotel.' a été activé avec succès');
    }

    public function desactiver_hotel($id){
        $hotel =  hotel::find($id);

        $hotel->status_hotel = 0;

        $hotel->update();

        return redirect()->back()->with('status_hotel', 'Hotel'.$hotel->nom_hotel.' a été desactiver avec succès');
    }
}
