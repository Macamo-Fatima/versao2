<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cargo', 'tipo_competencia',  'id_avaliacao', 
    ];
}
