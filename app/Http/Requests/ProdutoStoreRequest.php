<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoStoreRequest extends FormRequest
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
            'descricao'=>'required|string',
            'imagem'=>'nullable|image',
            'preco'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'status'=>'required|boolean',
        ];
    }
}
