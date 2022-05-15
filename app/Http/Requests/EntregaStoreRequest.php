<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntregaStoreRequest extends FormRequest
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
            'models_funcionario_id'=>'required|string|max:50',
            'dt_entrega'=>'required|string|max:50',
            'descricao'=>'nullable|string|max:50',
            'status'=>'required|string|max:50',
            'cidade'=>'required|string|max:50',
            'endereco'=>'nullable|string|max:50',
            'endereco'=>'nullable|string|max:50',
            'pedido_id'=>'required|string|max:50',
        ];
    }

    public function messages(){

        return[
        'models_funcionario_id.required'=>'Selecione um funcionário!',
        'pedido_id.required'=>'Selecione um pedido!',
        'dt_entrega.required'=>'Selecione uma data para a entrega!',
        'status.required'=>'Selecione uma status!',
        'cidade.required'=>'CIDADE não pode ser nula!',
        ];
    }
}
