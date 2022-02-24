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
            'fantasia'=>'nullable|string|max:50',
            'email'=>'nullable|string|max:50',
            'telefone'=>'required|string|max:50',
            'cpf'=>'nullable|string|max:11',
            'cnpj'=>'nullable|string|max:50',
            'cep'=>'required|string|max:50',
            'cidade'=>'required|string|max:50',
            'uf'=>'required|string|max:50',
            'logradouro'=>'required|string|max:50',
            'numero'=>'required|string|max:50',
            'observacao'=>'nullable|string',
        ];
    }
}
