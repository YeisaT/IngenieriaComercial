<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RedSocial;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    public function index()
    {
        return view('admin.redes.index', [
            'redes' => RedSocial::orderBy('tipo')->orderBy('orden')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.redes.form', ['red' => new RedSocial()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icono'  => ['required', 'string', 'max:100'],
            'url'    => ['required', 'url'],
            'label'  => ['required', 'string', 'max:100'],
            'tipo'   => ['required', 'in:institucional,inmerco'],
            'orden'  => ['required', 'integer', 'min:0'],
        ]);
        RedSocial::create($data);
        return redirect()->route('admin.redes.index')->with('success', 'Red social creada.');
    }

    public function edit(RedSocial $red)
    {
        return view('admin.redes.form', compact('red'));
    }

    public function update(Request $request, RedSocial $red)
    {
        $data = $request->validate([
            'icono'  => ['required', 'string', 'max:100'],
            'url'    => ['required', 'url'],
            'label'  => ['required', 'string', 'max:100'],
            'tipo'   => ['required', 'in:institucional,inmerco'],
            'orden'  => ['required', 'integer', 'min:0'],
        ]);
        $red->update($data);
        return redirect()->route('admin.redes.index')->with('success', 'Red social actualizada.');
    }

    public function destroy(RedSocial $red)
    {
        $red->delete();
        return back()->with('success', 'Red social eliminada.');
    }
}
