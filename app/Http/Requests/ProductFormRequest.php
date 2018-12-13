<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255|alpha_num',
            'description' => 'required|min:5|max:255',
            'image' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|integer'
        ];
    }
}
