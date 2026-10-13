<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfraestructuraController;
use App\Http\Controllers\NoticiaPublicaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\Admin\RedSocialController;
use App\Http\Controllers\Admin\TiktokReelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PerfilController;

// ── Sitio público ──────────────────────────────────────────
Route::get('/', [HomeController::class, 'index']);
Route::get('/infraestructura/{slug}', [InfraestructuraController::class, 'show'])
     ->name('infraestructura.show')
     ->where('slug', 'sepeg|aulas|computo|lectura|auditorio|direccion');
Route::get('/noticias/{noticia:slug}', [NoticiaPublicaController::class, 'show'])
     ->name('noticias.show');

// ── Autenticación admin ────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Panel protegido
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/',                          [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('noticias', NoticiaController::class)->except(['show']);
        Route::delete('noticias/{noticia}/imagen', [NoticiaController::class, 'destroyImagen'])->name('noticias.imagen.destroy');
        Route::resource('redes',                 RedSocialController::class)->except(['show'])->parameters(['redes' => 'red']);
        Route::resource('usuarios', UserController::class)->except(['show'])->parameters(['usuarios' => 'usuario']);
        Route::resource('tiktok',   TiktokReelController::class)->except(['show'])->parameters(['tiktok' => 'tiktok']);
        Route::get('perfil',  [PerfilController::class, 'index'])->name('perfil');
        Route::post('perfil', [PerfilController::class, 'update'])->name('perfil.update');
    });
});
