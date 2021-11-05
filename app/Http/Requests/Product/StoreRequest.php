<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required|unique:products', 
            'image' => 'nullable|image', 
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requirido..',
            'name.unique' => 'El nombre ya existe..',
            'image.image' => 'debe se der un formato de imagen..',
            'price.required' => 'El Precio es requirido..',
        ];
    }
}
