<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigRequest;
use App\Models\Configuration;
use Exception;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index(){
        $allconfigurations = Configuration::latest()->paginate(10); //trier par ordre décroissant selon une colonne de date
        return view('config.index', compact('allconfigurations'));
    }

    public function create(){
        return view('config.create');
    }

    public function store(StoreConfigRequest $request){
        try{
            Configuration::create([
                'type'=>$request->input('type'),
                'value'=>$request->input('valeur')
            ]);
            return redirect()->route('configuration.index')->with('success_msg','Configuration ajoutée'); 

        }catch(Exception $e){ 
            dd($e);
            throw new Exception('Erreur lors de l\'enregistrement de la configuration : '); 
        }
    }
    
    public function delete(Configuration $configuration){
        try{
                $configuration->delete();
            return redirect()->route('configuration.index')->with('success_msg','Configuration suprimée'); 
   
        }catch(Exception $e){
            dd($e);
            throw new Exception('Erreur lors de suppression');
        }
    }

}
