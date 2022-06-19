<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'models_cliente_id',
        'valor_total',
        'imagem_cartaz',
        'data_entrega',
        'descricao',
        'status', 
        'corel'

    ];

    public function models_cliente(){
        return $this->belongsTo(ModelsCliente::class);
    }
}
