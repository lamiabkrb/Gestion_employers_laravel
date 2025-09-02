<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavedepartementRequest;
use App\Models\Departement;
use Exception;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index(){
        $departements = Departement::paginate(10);
        return view('departement.index',compact('departements'));
    }

    public function create(){
        return view('departement.create');
    }

    public function edit(Departement $departement){
        return view('departement.edit', compact('departement'));
    }

    //interraction avec la BD
    public function store( Departement $departement,  SavedepartementRequest $request){
        //enregister un nouveau departement 
     
       try {
        $departement->name =$request->name;
        $departement->save();

        return redirect()->route('departement.index')->with('success_msg','Deprtement enregistré');


       } catch (Exception $e) {
        dd($e);
       }
        


    }
}
