<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|unique:products,name,'. $this->route('product')->id, 
            'image' => 'nullable|image', 
            'price' => 'required', 
            'category_id' => 'integer|required|exists:App\Models\Category,id', 
            'provider_id' => 'integer|required|exists:App\Models\Provider,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requirido..',
            'name.unique' => 'El nombre ya existe..',
            'image.image' => 'debe se der un formato de imagen..',
            'price.required' => 'El Precio es requirido..',

            'category_id.integer' => 'Debe de ser un numero..',
            'category_id.required' => 'La Categoria es requirida..',
            'category_id.exists' => 'La categoria no existe..',
            
            'provider_id.integer' => 'Debe de ser un numero..',
            'provider_id.required' => 'La provedor es requirido..',
            'provider_id.exists' => 'La provedor no existe..',
        ];
    }
}
