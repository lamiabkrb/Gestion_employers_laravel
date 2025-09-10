<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfigRequest extends FormRequest
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
            'type'=>'required|unique:configurations,type',
            'valeur'=>'required'
        ];
    }

    public function messages()
    {
        return[
            'type.required'=>'Le type de configuration est obligatoire ',
            'type.unique'=>'Cette configuration existe déja',
            'valeur.required'=>'La valeur est requise'
        ];
    }
}
