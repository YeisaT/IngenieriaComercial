<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    protected $table    = 'redes_sociales';
    protected $fillable = ['icono', 'url', 'label', 'tipo', 'orden'];

    public function scopeInstitucional($query) { return $query->where('tipo', 'institucional')->orderBy('orden'); }
    public function scopeInmerco($query)        { return $query->where('tipo', 'inmerco')->orderBy('orden'); }
}
