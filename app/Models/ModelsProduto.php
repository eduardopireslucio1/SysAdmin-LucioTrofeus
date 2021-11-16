<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsProduto extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'material' => 'array'
    ];

    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'preco',
        'status',
        'material'

    
    ];
}
