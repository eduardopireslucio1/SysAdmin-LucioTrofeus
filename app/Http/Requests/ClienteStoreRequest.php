<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteStoreRequest extends FormRequest
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
            'nome_razaosocial'=>'required|string|max:50',
            'email'=>'required|string|max:50',
            'telefone'=>'required|string|max:50',
            'cpf'=>'required|string|max:11',
            'cnpj'=>'required|string|max:50',
            'cep'=>'required|string|max:50',
            'cidade'=>'required|string|max:50',
            'uf'=>'required|string|max:50',
            'rua'=>'required|string|max:50',
            'numero'=>'required|string|max:50',
            'observacao'=>'required|string',
        ];
    }
}
