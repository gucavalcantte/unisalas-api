<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
       'curso', 'turma', 'sala', 'bloco', 'andar', 'semestre', 'periodo' 
    ];
}
