<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoDesempenho extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_funcionario', 'tipo_avaliacao', 'data', 'acao', 'c_avaliador', 'c_avaliado', 'usuario',
    ];
}
