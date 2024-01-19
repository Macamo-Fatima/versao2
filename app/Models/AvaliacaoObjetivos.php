<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoObjetivos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_avaliacao', 'disponibilidade_info', 'cumprimento_legislacao', 'desenvolvimento_prof', 'garantir_efetividade', 'niveis_liquidez ', 'assessorar',
    ];
}
