<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_funcionario', 'tipo_objetivo',  'id_objetivo',
    ];
}
