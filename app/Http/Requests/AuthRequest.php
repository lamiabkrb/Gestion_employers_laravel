<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class AuthRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|min:4'
        ];
    }

    public function messages()
    {
        return[
            'email.required'=>'Le mail est requis',
            'email.email'=>'Mauvais format du mail',
            'password.required'=>'Mot de passe requis',
            'password.min'  => 'Le mot de passe doit contenir au moins: 4'

         ];
    } 
}
