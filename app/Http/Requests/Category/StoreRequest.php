<?php

namespace App\Http\Requests\Category;

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
            'name' => 'required|string|max:70',
            'description' => 'nullable|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido..',
            'name.string' => 'El valor no es correcto..',
            'name.max' => 'Solo se permite maximo 70 caracteres..',
            'description.string' => 'El valor no es correcto..',
            'description.max' => 'Solo se permite maximo 255 caracteres..'
        ];
    }
       
}