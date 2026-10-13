<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    private const TZ_BOLIVIA = 'America/La_Paz';   // UTC-4
    private const IMG_DIR    = 'img/noticias';

    public function index()
    {
        return view('admin.noticias.index', [
            'noticias' => Noticia::orderBy('orden')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.noticias.form', ['noticia' => new Noticia()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateNoticia($request);
        $data['activo']     = $request->boolean('activo');
        $data['imagen_url'] = $this->resolveImagen($request, null);
        $data['publicar_desde'] = $this->toUtc($request->input('publicar_desde_local'));
        $data['publicar_hasta'] = $this->toUtc($request->input('publicar_hasta_local'));

        Noticia::create($data);
        return redirect()->route('admin.noticias.index')
                         ->with('success', 'Noticia creada correctamente.');
    }

    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.form', [
            'noticia'         => $noticia,
            'desde_local'     => $this->toBolivia($noticia->publicar_desde),
            'hasta_local'     => $this->toBolivia($noticia->publicar_hasta),
        ]);
    }

    public function update(Request $request, Noticia $noticia)
    {
        $data = $this->validateNoticia($request);
        $data['activo']     = $request->boolean('activo');
        $data['imagen_url'] = $this->resolveImagen($request, $noticia->imagen_url);
        $data['publicar_desde'] = $this->toUtc($request->input('publicar_desde_local'));
        $data['publicar_hasta'] = $this->toUtc($request->input('publicar_hasta_local'));

        $noticia->update($data);
        return redirect()->route('admin.noticias.index')
                         ->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(Noticia $noticia)
    {
        $this->deleteLocalImage($noticia->imagen_url);
        $noticia->delete();
        return back()->with('success', 'Noticia eliminada.');
    }

    public function destroyImagen(Noticia $noticia)
    {
        $this->deleteLocalImage($noticia->imagen_url);
        $noticia->update(['imagen_url' => '']);
        return back()->with('success', 'Imagen eliminada.');
    }

    // ── Helpers ──────────────────────────────────────────

    private function validateNoticia(Request $request): array
    {
        return $request->validate([
            'titulo'              => ['required', 'string', 'max:255'],
            'descripcion'         => ['required', 'string'],
            'cuerpo'              => ['nullable', 'string'],
            'href'                => ['required', 'string'],
            'fecha'               => ['required', 'string', 'max:50'],
            'orden'               => ['required', 'integer', 'min:0'],
            'activo'              => ['boolean'],
            'imagen'              => ['nullable', 'image', 'max:4096'],
            'imagen_url'          => ['nullable', 'string', 'max:500'],
            'publicar_desde_local'=> ['nullable', 'string'],
            'publicar_hasta_local'=> ['nullable', 'string'],
        ]);
    }

    /**
     * Convert a Bolivia datetime string (Y-m-d\TH:i) to UTC Carbon or null.
     */
    private function toUtc(?string $localDatetime): ?Carbon
    {
        if (empty($localDatetime)) return null;
        try {
            return Carbon::createFromFormat('Y-m-d\TH:i', $localDatetime, self::TZ_BOLIVIA)
                         ->setTimezone('UTC');
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Convert a UTC Carbon to Bolivia datetime string for the form input, or null.
     * Uses copy() to avoid mutating the original Carbon instance.
     */
    private function toBolivia(?Carbon $utc): ?string
    {
        if (!$utc) return null;
        return $utc->copy()->setTimezone(self::TZ_BOLIVIA)->format('Y-m-d\TH:i');
    }

    private function resolveImagen(Request $request, ?string $current): string
    {
        if ($request->hasFile('imagen')) {
            $this->deleteLocalImage($current);
            $file     = $request->file('imagen');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(self::IMG_DIR), $filename);
            return '/' . self::IMG_DIR . '/' . $filename;
        }
        if ($request->filled('imagen_url')) {
            return $request->input('imagen_url');
        }
        return $current ?? '';
    }

    private function deleteLocalImage(?string $url): void
    {
        if (!$url) return;
        if (str_starts_with($url, '/' . self::IMG_DIR . '/')) {
            $path = public_path(ltrim($url, '/'));
            if (file_exists($path)) unlink($path);
        }
    }
}
