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
        $employers = Employé::with('departement')->paginate(10);//departement
      return view('employers.index', compact('employers'));
    }

    public function create(){
        $departements = Departement::all();  //permet de recuperer tous les departments
        return view('employers.create', compact('departements'));
    }

    public function edit(Employé $employer){
      $departements = Departement::all();
        return view('employers.edit', compact('employer', 'departements'));
    }

    //interraction avec la BD
    public function store( StoreEmloyerRequest $request){
      try{
        //  $employer->nom = $request->first_name;
        // $employer->prenom = $request->last_name;
        // $employer->email = $request->email;
        // $employer->contact = $request->phone;
        // $employer->montant_journalier = $request->montant_journalier;
        // $employer->departement_id = $request->departement_id;
        // $employer->save();
        $query = Employé::create([
           'nom' => $request->input('first_name'),
           'prenom' => $request->input('last_name'),
           'email' => $request->input('email'),
           'contact' => $request->input('phone'),
           'departement_id' => $request->input('departement_id'),
           'montant_journalier' => $request->input('montant_journalier')
        ]);

        if($query){
            return redirect()->route('employer.index')->with('success_msg','Employé enregistré ');
        }
      }catch(Exception $e){
        dd($e);
      }
    }

    public function update(Employé $employer, StoreEmloyerRequest $request){
        try {
            $employer->nom = $request->first_name;
            $employer->prenom = $request->last_name;
            $employer->email =$request->email;
            $employer->contact=$request->phone;
            $employer->montant_journalier = $request->montant_journalier;
            $employer->departement_id = $request->departement_id;
            $employer->update();
            return redirect()->route('employer.index')->with('success_msg','Employer mis à jour');
        } catch (Exception $e) {
          dd($e);
        }
    }

    public function delete(Employé $employer){
        //supprimer un departement
        try{
            $employer->delete();
            return redirect()->route('employer.index')->with('success_msg','Employer supprimé');

        }catch(Exception $e){
            dd($e);
        }
    }
}
