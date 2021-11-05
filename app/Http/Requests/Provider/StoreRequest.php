<?php

namespace App\Http\Requests\Provider;

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
            'name' => 'required|string',
            'email' => 'required|email',
            'ruc' => 'required|unique:providers',
            'addres' => 'nullable',
            'photo' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido..',
            'name.string' => 'El valor no es correcto..',
            'email.required' => 'El Correo es requirido..',
            'email.email' => 'El Correo debe de ser un email..',
            'ruc.required' => 'El Rut es requirido..',
            'ruc.unique' => 'El numero del ruc ya existe..'
        ];
    }
}
