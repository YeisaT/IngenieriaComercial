<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelGraduacion extends Model
{
    protected $table    = 'niveles_graduacion';
    protected $fillable = ['icono', 'titulo', 'requisito', 'modalidades', 'titulo_otorgado', 'orden'];
    protected $casts    = ['modalidades' => 'array'];
}
