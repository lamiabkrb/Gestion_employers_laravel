<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DefineAccesRequest extends FormRequest
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
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required|same:password|min:8',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Le mot de passe est obligatoire',
            'password.same' => 'Les mots de passe ne correspondent pas',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'confirm_password.required' => 'La confirmation du mot de passe est obligatoire',
            'confirm_password.same' => 'Les mots de passe ne correspondent pas',
            'confirm_password.min' => 'La confirmation du mot de passe doit contenir au moins 8 caractères',
        ];
    }
}
