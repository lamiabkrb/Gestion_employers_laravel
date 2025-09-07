<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmloyerRequest;
use App\Models\Departement;
use App\Models\Employé;
use Exception;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index(){
        $employers = Employé::paginate(10);
        return view('employers.index',compact('employers'));
    }

    public function create(){
        $departements = Departement::all();  //permet de recuperer tous les departments 
        return view('employers.create', compact('departements'));
    }

    public function edit(Employé $employer){
        return view('employers.edit', compact('employer'));
    }

    //interraction avec la BD                         
    public function store(Employé $employer, StoreEmloyerRequest $request){
      try{
          $employer->nom = $request->first_name;
        $employer->prenom = $request->last_name;
        $employer->email = $request->email;
        $employer->contact = $request->phone;
        $employer->montant_journalier = $request->montant_journalier;
        $employer->departement_id = $request->departement_id;
        $employer->save();
        return redirect()->route('employer.index')->with('success_msg','Employé enregistré ');

      }catch(Exception $e){
        dd($e);
      }
    }
}
