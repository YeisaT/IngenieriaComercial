<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampoLaboral extends Model
{
    protected $table    = 'campo_laboral';
    protected $fillable = ['icono', 'titulo', 'descripcion', 'orden'];
}
