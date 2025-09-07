<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'email'=>'required|unique:employés,email',
            'phone'=>'required|unique:employés,contact|max:10,min:10',
            'montant_journalier'=>'required|numeric|min:1000'
            
        ];
    }

     public function messages()
    {
        return[
            'email.required'=>'Le mail est obligatoire',
            'email.unique'=>'Le mail existe deja ',
            'phone.required'=>'Le contact est obligatoire',
            'phone.unique'=>'Le numero de telephone existe deja '
         ];
    } 
}
