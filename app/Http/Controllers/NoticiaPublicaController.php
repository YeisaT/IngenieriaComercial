<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class NoticiaPublicaController extends Controller
{
    public function show(Noticia $noticia)
    {
        // Verifica visibilidad completa (activo + fechas)
        abort_unless($noticia->isVisible(), 404);

        $relacionadas = Noticia::activas()
            ->where('id', '!=', $noticia->id)
            ->limit(3)
            ->get();

        return view('noticias.detalle', compact('noticia', 'relacionadas'));
    }
}
