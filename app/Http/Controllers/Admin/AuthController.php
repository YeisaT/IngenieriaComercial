<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return auth()->check() ? redirect()->route('admin.dashboard') : view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            if (!auth()->user()->isAdmin()) {
                Auth::logout();
                // Si viene del modal, vuelve a la home con error en sesión
                if ($request->input('from_modal')) {
                    return redirect('/')->with('login_error', 'No tienes permisos de administrador.');
                }
                return back()->withErrors(['email' => 'No tienes permisos de administrador.']);
            }
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Si viene del modal, vuelve a la home con error en sesión
        if ($request->input('from_modal')) {
            return redirect('/')->with('login_error', 'Credenciales incorrectas. Verifica tu correo y contraseña.');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
