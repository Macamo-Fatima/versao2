<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proficience extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_do_cargo', 'nome_da_competencia', 'nivel_proficiencia', 'id_da_avaliacao',
    ];
}
