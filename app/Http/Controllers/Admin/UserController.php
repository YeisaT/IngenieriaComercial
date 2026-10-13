<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.usuarios.index', [
            'usuarios' => User::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.usuarios.form', ['usuario' => new User()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'role'     => ['required', 'in:admin,editor'],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()],
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $usuario)
    {
        return view('admin.usuarios.form', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'unique:users,email,' . $usuario->id],
            'role'     => ['required', 'in:admin,editor'],
            'password' => ['nullable', Password::min(8)->mixedCase()->numbers()],
        ]);
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }
        $usuario->update($data);
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy(User $usuario)
    {
        abort_if($usuario->id === auth()->id(), 403, 'No puedes eliminar tu propio usuario.');
        $usuario->delete();
        return back()->with('success', 'Usuario eliminado.');
    }
}
