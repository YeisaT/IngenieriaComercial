<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    private const PHOTO_PATH = 'img/developer/profile.jpg';

    public function index()
    {
        return view('admin.perfil', [
            'hasPhoto' => file_exists(public_path(self::PHOTO_PATH)),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'foto' => ['required', 'image', 'mimes:jpg,jpeg', 'max:4096'],
        ], [
            'foto.required' => 'Selecciona una imagen.',
            'foto.mimes'    => 'La foto debe ser JPG/JPEG.',
            'foto.max'      => 'La foto no debe superar 4 MB.',
        ]);

        $dir = public_path('img/developer');
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        // Guarda siempre como profile.jpg, reemplazando la anterior
        $request->file('foto')->move($dir, 'profile.jpg');

        return back()->with('success', 'Foto de perfil actualizada correctamente.');
    }
}
