<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class, 'login'])->name('login');

Route::post('/',[AuthController::class, 'handlelogin'])
    ->name('handlelogin');


 //route sécurisée par lauthentification si un user nest ps connecté il ne pourra pas acceder 
Route::middleware('auth')->group(function(){
    Route::get('dashboard',[AppController::class,'index'])->name('dashboard');

 //Toutes les routes de ce groupe doivent commencer par /employers dans l’URL
    Route::prefix('employers')->group(function(){
        Route::get('/',[EmployeController::class, 'index'])->name('employer.index');
        Route::get('/create',[EmployeController::class, 'create'])->name('employer.create');
        Route::get('/edit/{employer}',[EmployeController::class,'edit'])->name('employer.edit');   // avec param lemployé a modifier 
        Route::post('/store',[EmployeController::class, 'store'])->name('employer.store');

    });

     //Toutes les routes de ce groupe doivent commencer par /departement dans l’URL
    Route::prefix('departements')->group(function(){
        Route::get('/',[DepartementController::class, 'index'])->name('departement.index');
        Route::get('/create',[DepartementController::class, 'create'])->name('departement.create');
        Route::post('/create',[DepartementController::class, 'store'])->name('departement.store');
        Route::get('/edit/{departement}',[DepartementController::class,'edit'])->name('departement.edit');   // avec param departement a modifier
        Route::put('/update/{departement}',[DepartementController::class,'update'])->name('departement.update');   // avec param departement a modifier
        Route::get('/{departement}',[DepartementController::class,'delete'])->name('departement.delete');   // avec param departement a modifier


    });


});
