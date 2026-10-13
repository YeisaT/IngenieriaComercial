<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TiktokReel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TiktokReelController extends Controller
{
    private const IMG_DIR = 'img/tiktok';

    public function index()
    {
        return view('admin.tiktok.index', [
            'reels' => TiktokReel::orderBy('orden')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.tiktok.form', ['reel' => new TiktokReel()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateReel($request);
        $data['activo']     = $request->boolean('activo');
        $data['imagen_url'] = $this->resolveImagen($request, null);

        TiktokReel::create($data);
        return redirect()->route('admin.tiktok.index')->with('success', 'Reel creado correctamente.');
    }

    public function edit(TiktokReel $tiktok)
    {
        return view('admin.tiktok.form', ['reel' => $tiktok]);
    }

    public function update(Request $request, TiktokReel $tiktok)
    {
        $data = $this->validateReel($request);
        $data['activo']     = $request->boolean('activo');
        $data['imagen_url'] = $this->resolveImagen($request, $tiktok->imagen_url);

        $tiktok->update($data);
        return redirect()->route('admin.tiktok.index')->with('success', 'Reel actualizado correctamente.');
    }

    public function destroy(TiktokReel $tiktok)
    {
        $this->deleteLocalImage($tiktok->imagen_url);
        $tiktok->delete();
        return back()->with('success', 'Reel eliminado.');
    }

    private function validateReel(Request $request): array
    {
        return $request->validate([
            'titulo'    => ['nullable', 'string', 'max:120'],
            'vistas'    => ['nullable', 'string', 'max:20'],
            'link'      => ['required', 'url'],
            'orden'     => ['required', 'integer', 'min:0'],
            'activo'    => ['boolean'],
            'imagen'    => ['nullable', 'image', 'max:4096'],
            'imagen_url'=> ['nullable', 'string', 'max:500'],
        ]);
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
        if (!$url || !str_starts_with($url, '/' . self::IMG_DIR . '/')) return;
        $path = public_path(ltrim($url, '/'));
        if (file_exists($path)) unlink($path);
    }
}
