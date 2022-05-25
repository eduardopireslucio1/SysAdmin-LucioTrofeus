<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModelsCliente extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable=[
        'nome_razaosocial',
        'fantasia',
        'email',
        'telefone',
        'cpf',
        'cnpj',
        'cep',
        'cidade',
        'uf',
        'logradouro',
        'numero',
        'observacao'
    ];
    
    function getDocument() {
        $document = $this->cpf ? $this->cpf : $this->cnpj;
        return $document;
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

}
