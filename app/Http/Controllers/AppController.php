<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employé;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        $totalDepartement= Departement::all()->count();
        $totalEmploye= Employé::all()->count();
        $totaladministrateur=User::all()->count();
        return view('dashboard', compact('totalDepartement','totalEmploye','totaladministrateur'));
    }
}
