<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required', 
            'dni' => 'required|unique:clients', 
            'ruc' => 'nullable', 
            'address' => 'nullable', 
            'phone' => 'nullable', 
            'email' => 'nullable|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo es requerido',
            'dni.required' => 'El campo es requerido',
            'dni.unique' => 'El campo ya existe',
            'email.email' => 'El campo debe ser de tipo email',
        ];
    }
}
