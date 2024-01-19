<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrauAcademico extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_funcionario', 'nivel_academico', 'especializacao', 'instituicao', 'inicio_termino',
    ];
}
