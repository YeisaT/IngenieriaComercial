<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiktokReel extends Model
{
    protected $table    = 'tiktok_reels';
    protected $fillable = ['imagen_url', 'titulo', 'vistas', 'link', 'orden', 'activo'];
    protected $casts    = ['activo' => 'boolean'];

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
