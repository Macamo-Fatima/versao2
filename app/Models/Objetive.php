<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetive extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_avaliacao', 'objetivo_funcionario',
    ];
}
