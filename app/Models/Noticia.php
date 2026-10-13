<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Noticia extends Model
{
    protected $fillable = [
        'titulo', 'slug', 'descripcion', 'cuerpo',
        'imagen_url', 'href', 'fecha', 'activo', 'orden',
        'publicar_desde', 'publicar_hasta',
    ];

    protected $casts = [
        'activo'         => 'boolean',
        'publicar_desde' => 'datetime',   // stored UTC, cast to Carbon
        'publicar_hasta' => 'datetime',
    ];

    // Auto-generate slug on save
    protected static function booted(): void
    {
        static::saving(function (self $n) {
            if (empty($n->slug)) {
                $n->slug = Str::slug($n->titulo);
            }
        });
    }

    // Route model binding uses slug for public routes
    // Admin resource routes use id (default)
    public function getRouteKeyName(): string
    {
        return 'id';
    }

    // ── Visibility logic ─────────────────────────────────

    /**
     * Is this noticia currently visible to the public?
     * Compares UTC now against UTC-stored timestamps.
     */
    public function isVisible(): bool
    {
        if (!$this->activo) return false;

        $now = Carbon::now('UTC');

        if ($this->publicar_desde && $now->lt($this->publicar_desde)) {
            return false;   // not yet published
        }
        if ($this->publicar_hasta && $now->gt($this->publicar_hasta)) {
            return false;   // expired
        }
        return true;
    }

    /**
     * Human-readable status label (for admin panel).
     */
    public function statusLabel(): string
    {
        if (!$this->activo) return 'Inactiva';

        $now = Carbon::now('UTC');

        if ($this->publicar_desde && $now->lt($this->publicar_desde)) {
            return 'Programada';
        }
        if ($this->publicar_hasta && $now->gt($this->publicar_hasta)) {
            return 'Expirada';
        }
        return 'Publicada';
    }

    public function statusClass(): string
    {
        return match($this->statusLabel()) {
            'Publicada'  => 'adm-badge-green',
            'Programada' => 'adm-badge-blue',
            'Expirada'   => 'adm-badge-red',
            default      => 'adm-badge-gray',
        };
    }

    // ── Scopes ───────────────────────────────────────────

    public function scopeActivas($query)
    {
        $now = Carbon::now('UTC');
        return $query
            ->where('activo', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('publicar_desde')
                  ->orWhere('publicar_desde', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('publicar_hasta')
                  ->orWhere('publicar_hasta', '>', $now);
            })
            ->orderBy('orden');
    }
}
