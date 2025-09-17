<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Le nom est obligatoire',
            'email.required'=>'L\'email est obligatoire',
            'email.email'=>'L\'email doit être une adresse email valide',
            'email.unique'=>'Cet email existe déja',
            
        ];
    }
}
