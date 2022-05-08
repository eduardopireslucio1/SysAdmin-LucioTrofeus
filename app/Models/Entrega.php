<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = [
        'models_funcionario_id',
        'dt_entrega',
        'custo',
        'endereco',
        'descricao',
        'status'

    ];

    public function funcionario(){
        return $this->belongsTo(ModelsFuncionario::class);
    }
}
