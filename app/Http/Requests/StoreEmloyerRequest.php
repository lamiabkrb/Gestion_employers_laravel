<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmloyerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'departement_id'=>'required|integer',
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>['required', 'email', Rule::unique('employés', 'email')->ignore($this->employer) ],
            'phone'=>['required', 'max:10', 'min:10', Rule::unique('employés', 'contact')->ignore($this->employer) ],
            'montant_journalier'=>'required|numeric|min:1000'
            
        ];
    }

     public function messages()
    {
        return[
            'departement_id.required'=>'Champs obligatoire',
            'first_name.required'=>'Champs obligatoire',
            'last_name.required'=>'Champs obligatoire',
            'email.required'=>'Le mail est obligatoire',
            'email.unique'=>'Le mail existe deja ',
            'phone.required'=>'Le contact est obligatoire',
            'phone.unique'=>'Le numero de telephone existe deja ',
            'montant_journalier.min'=>'Le montant journalier doit etre au moins de 1000'

         ];
    } 
}
