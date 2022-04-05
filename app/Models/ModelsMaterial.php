<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsMaterial extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
        'preco'
    ];
}
