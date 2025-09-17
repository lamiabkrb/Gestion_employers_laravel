<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Departement;
use App\Models\Employé;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){

 //_____________________________________ Gestion des statistique__________________________
        $totalDepartement= Departement::all()->count();
        $totalEmploye= Employé::all()->count();
        $totaladministrateur=User::all()->count();



 //_____________________________________ Gestion des Notification des paiement__________________________

        $defaultPaiementDate=null;
        $paiementnotification="";    // chaine vide 
        $currentedate=Carbon::now()->day;   // recuperation de la journée seulement 
       $defaultPaiementDateQuery=Configuration::where('type','PAIEMENT_DATE')->first();
       if($defaultPaiementDateQuery){
             $defaultPaiementDate=$defaultPaiementDateQuery->value;
             $convertPaiementDate=intval($defaultPaiementDate);
            if ($currentedate < $convertPaiementDate) {
                $paiementnotification="Le paiement doit avoir lieu le ". $defaultPaiementDate . " de ce mois";
            }else {
                $nextMonth=Carbon::now()->addMonth();
                $nextMonthName=$nextMonth->format('F');
                $paiementnotification="Le paiement doit avoir lieu le " . $defaultPaiementDate . " " . $nextMonthName;
            }
       }
       return view('dashboard', compact('totalDepartement','totalEmploye','totaladministrateur','paiementnotification'));
    }
}
