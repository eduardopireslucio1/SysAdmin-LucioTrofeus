<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsFuncionario extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable=[
        'nome',
        'cpf',
        'dt_nascimento',
        'dt_admissao',
        'carga_horaria',
        'cargo',
        'salario',
    ];

    public function entregas(){
        return $this->hasMany(Entrega::class);
    }

}
