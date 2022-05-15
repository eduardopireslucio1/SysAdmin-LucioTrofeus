<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioStoreRequest extends FormRequest
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
            'cpf'=>'required|string|regex:"\d{3}.\d{3}.\d{3}-?\d{2}"',
            'dt_nascimento'=>'required|string|max:15',
            'dt_admissao'=>'required|string|max:15',
            'carga_horaria'=>'required|string|max:2',
            'cargo'=>'required|string|max:50',
            'salario'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function messages(){
        return[
            'nome.required'=>'NOME não pode ser nulo!', 
            'cpf.required'=>'CPF não pode ser nulo!', 
            'cpf.regex'=>'O CPF deve ter 11 caracteres!', 
            'dt_nascimento.required'=>'DATA DE NASCIMENTO não pode ser nula!', 
            'dt_admissao.required'=>'DATA DE ADMISSÃO não pode ser nula!', 
            'carga_horaria.required'=>'CARGA HORÁRIA não pode ser nula!', 
            'cargo.required'=>'CARGO não pode ser nulo!', 
            'salario.required'=>'SALÁRIO não pode ser nulo!', 
        ];
    }
}
