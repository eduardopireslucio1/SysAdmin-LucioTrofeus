<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'valor_total',
        'imagem_cartaz',
        'data_entrega',
        'descricao'

    ];
}