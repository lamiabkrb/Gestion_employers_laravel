<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function handlelogin(AuthRequest $request){
        
        $credentials=($request->only(['email','password']));
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }return redirect()->back()->with('error_msg','Parametre de connexion non reconnu');

    }

    public function logout(Request $request)
        {
            Auth::logout(); // Déconnecte l’utilisateur
            $request->session()->invalidate(); // Invalide la session
            $request->session()->regenerateToken(); // Regénère le token CSRF
            return redirect()->route('login'); // Redirection vers login
        }

}


