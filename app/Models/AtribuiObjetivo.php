<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtribuiObjetivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'cargo_funcionarioo', 'dep_funcionario', 'missao_funcionario', 'local_funcionario', 'reporte_funcionario', 'objetivo_atribuicao',
    ];
}
