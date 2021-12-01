<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'models_produto_id',
        'quantidade',
        'tamanho',
        'valor'

    ];
}
