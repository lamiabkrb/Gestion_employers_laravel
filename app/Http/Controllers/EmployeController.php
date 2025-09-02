<?php

namespace App\Http\Controllers;

use App\Models\Employé;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index(){
        $employers = Employé::paginate(10);
        return view('employers.index',compact('employers'));
    }

    public function create(){
        return view('employers.create');
    }

    public function edit(Employé $employer){
        return view('employers.edit', compact('employer'));
    }
}
