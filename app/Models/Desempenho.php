<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desempenho extends Model
{
    use HasFactory;
    protected $fillable = [
        'cargo', 'dep', 'missao', 'local', 'reporte', 'competencia', 'proficiencia', 'word', 'excel', 'access', 'powerpoint',
    ];
}
