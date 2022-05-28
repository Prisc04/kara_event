<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function create(Request $request)
    {
        $request->validate([
            'nom_utilisateur'=>'required',
            'prenom_utilisateur'=>'required',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:5|max:30',
            'telephone'=>'required|',
            'role'=>'required|min:3|max:30',
            'password_confirmation'=>'required|min:5|max:30|same:password',
        ]);

        $admin = new Admin();
        $admin->admin_nom  =$request->nom_utilisateur;
        $admin->admin_prenom  =$request->prenom_utilisateur;
        $admin->admin_telephone  =$request->telephone;
        $admin->admin_role  =$request->role;
        $admin->email =$request->email;
        $admin->password = Hash::make($request->password);
        $save= $admin->save();

        if($save){
            return redirect()->back()->with('success', "vous avez enregistré M/Mm $request->nom_utilisateur");
        }else{
            return redirect()->back()->with('fail', "echec d'enregistrement");
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30',
        ],
        [
            'email.exists'=>"l'adresse n existe pas dans la base"
        ]);

        //les conditons d authentification
        $creds = $request->only('email','password');
        $creds = Arr::add($creds, 'admin_status', '0');

        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home')->with('success', 'vous êtes connecter ');
        }else{
            return redirect()->route('admin.login')->with('fail', 'error de connexion');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/admin_connexion_login');
    }

    public function liste(Request $request)
    {
        $admins = Admin::all();
        return view('interface_admin.affiche', compact('admins'));

    }





}

