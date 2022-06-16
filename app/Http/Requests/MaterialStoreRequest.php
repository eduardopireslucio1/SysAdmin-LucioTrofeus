<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialStoreRequest extends FormRequest
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
            'nome'=>'required|string|max:50',
            'descricao'=>'nullable|string',
            'quantidade'=>'required|string|max:50',
            'preco'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function messages(){

        return [
            'nome.required'=>'NOME não pode ser nulo!',
            'quantidade.required'=>'QUANTIDADE não pode ser nula!',
            'preco.required'=>'PREÇO não pode ser nulo!'
        ];

    }
}
