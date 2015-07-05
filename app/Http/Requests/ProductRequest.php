<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class ProductRequest extends Request
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
            'name' => 'max:80|required|unique:products,name,'.$this->id.'',
            'description' => 'required|unique:products,description,'.$this->id.'',
            'price' => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'MÁXIMO 80 caracteres.',
            'name.required' => 'Obrigatório.',
            'name.unique' => 'Indisponível.',
           
            'description.required' => 'Obrigatório.',
            'description.unique' => 'Indisponível.',

            'price.required' => 'Obrigatório.'
        ];
    }
}
