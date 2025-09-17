<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefineAccesRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\RestCodePassword;
use App\Models\User;
use App\Notifications\SendEmailToAdmin;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{

    public function index(){
        $admins = User::paginate(10);
        return view('admin.index',compact('admins'));
    }

    public function create(){
        return view('admin.create');
    }

    public function edit(User $user){
        return view('admin.edit', compact('user'));
    }

//Enregistrement d'un nouvel admin et envoie d'email
     public function store(StoreAdminRequest $request){

       
        try{
            //enregister l'admin
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make('default');
            $user->save();

           try{
                 //generation du code de verification
                if($user){
                    RestCodePassword::where('email',$user->email)->delete();
                    $code = rand(1000, 4000);
                    RestCodePassword::create([
                        'code' => $code,
                        'email' => $user->email
                    ]);
                }
                //envoie de l'email
                Notification::route('mail', $user->email)->notify(new SendEmailToAdmin($code, $user->email));
                
                return redirect()->route('administrateur.index')->with('success', 'Admin enregistré avec succès');
           }catch(Exception $e){
                dd($e);
                throw new Exception("Erreur lors de l'envoie de l'email");
            }

        }catch(Exception $e){
            dd($e);
            throw new Exception("Erreur lors de l'enregistrement de l'admin");
        }
    }

    public function update(UpdateAdminRequest $request, User $user){
        try{
            
        }catch(Exception $e){
            dd($e);
            throw new Exception("Erreur lors de la mise à jour de l'admin");
        }
    }

    public function delete(User $user){
        try{
            
        }catch(Exception $e){
            dd($e);
            throw new Exception("Erreur lors de la suppression de l'admin");
        }
    }

    public function defineAccess($email){
       $user = User::where('email', $email)->first();
       if($user){
         if($user->email_verified_at){
               return redirect()->route('login')->with('success', 'Votre compte est déjà activé. Veuillez vous connecter.')->withInput(['email' => $user->email]);
         } else {
               return view('auth.validate-account', compact('email'));
         }
       } else {
         return abort(403);
       }
    }

    public function SubmitDefineAccess(DefineAccesRequest $request){
        $user = User::where('email', $request->email)->first();
        //ajouter une condition si la colonne email_verified_at est deja remplie
        //si oui rediriger vers une page LOGIN
        if($user){
            $user->password = Hash::make($request->password);
            $user->email_verified_at = Carbon::now();
            $user->update();
            return redirect()->route('login')->with('success', 'Votre compte a été activé avec succès. Veuillez vous connecter.')->withInput(['email' => $user->email]);
        } else{
            return abort(403);
        }

    }
}
