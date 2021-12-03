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
            "name" => 'required|unique:products,name,'.$this->route('product')->id,
            "category" => 'required',
            "price" => 'required',
            "shopt_description" => 'required',
            "long_description" => 'required',
            "subcategory_id" => 'required',
            "provider_id" => 'required',
        ];
    }
}
