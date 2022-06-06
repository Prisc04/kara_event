<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $ligne = $request->validate([
            'admin_nom' => 'required|string',
            'admin_prenom' => 'required|string',
            'email' => 'required|string',
            'admin_telephone' => 'required|string',
            'admin_role' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Admin::create([
            'admin_nom' => $ligne['admin_nom'],
            'admin_prenom' => $ligne['admin_prenom'],
            'email' => $ligne['email'],
            'admin_telephone' => $ligne['admin_telephone'],
            'admin_role' => $ligne['admin_role'],
            'password' => bcrypt($ligne['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function login(Request $request){
        $ligne = $request->validate([

            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Admin::where('email', $ligne['email'])->first();

        if(!$user || !Hash::check($ligne['password'],$user->password)){
            return response([
                'message' => 'Erreur de mot de passe!'
            ],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){
        //auth()->user()->tokens()->delete();

        return [
            'message' => 'Deconnexion'
        ];
    }
}
