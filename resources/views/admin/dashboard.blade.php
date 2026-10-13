@extends('admin.layout')
@section('title', 'Dashboard')
@section('breadcrumb', 'Resumen general del sistema')

@section('content')
<div class="row g-4 mb-4">
  <div class="col-sm-3">
    <div class="adm-stat d-flex align-items-center justify-content-between">
      <div><div class="adm-stat-num">{{ $totalNoticias }}</div><div class="adm-stat-label">Noticias</div></div>
      <div class="adm-stat-icon"><i class="fa-solid fa-newspaper"></i></div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="adm-stat d-flex align-items-center justify-content-between">
      <div><div class="adm-stat-num">{{ $totalRedes }}</div><div class="adm-stat-label">Redes Sociales</div></div>
      <div class="adm-stat-icon"><i class="fa-solid fa-share-nodes"></i></div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="adm-stat d-flex align-items-center justify-content-between">
      <div><div class="adm-stat-num">{{ $totalTiktok }}</div><div class="adm-stat-label">TikTok Reels</div></div>
      <div class="adm-stat-icon"><i class="fa-brands fa-tiktok"></i></div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="adm-stat d-flex align-items-center justify-content-between">
      <div><div class="adm-stat-num">{{ $totalUsuarios }}</div><div class="adm-stat-label">Usuarios</div></div>
      <div class="adm-stat-icon"><i class="fa-solid fa-users"></i></div>
    </div>
  </div>
</div>

<div class="row g-4">
  <div class="col-md-4">
    <div class="adm-card h-100">
      <div class="adm-card-header">
        <span class="adm-card-title">Accesos rápidos</span>
      </div>
      <div class="adm-card-body d-flex flex-column gap-2">
        <a href="{{ route('admin.noticias.create') }}" class="adm-btn-primary">
          <i class="fa-solid fa-plus"></i> Nueva noticia
        </a>
        <a href="{{ route('admin.redes.create') }}" class="adm-btn-outline">
          <i class="fa-solid fa-plus"></i> Nueva red social
        </a>
        <a href="{{ route('admin.tiktok.create') }}" class="adm-btn-outline">
          <i class="fa-brands fa-tiktok"></i> Nuevo reel
        </a>
        <a href="{{ route('admin.usuarios.create') }}" class="adm-btn-outline">
          <i class="fa-solid fa-plus"></i> Nuevo usuario
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="adm-card">
      <div class="adm-card-header">
        <span class="adm-card-title">Información del sistema</span>
      </div>
      <div class="adm-card-body">
        <table class="adm-table">
          <tbody>
            <tr><td style="color:#9a9a9a;width:160px">Aplicación</td><td>Ingeniería Comercial FCEE</td></tr>
            <tr><td style="color:#9a9a9a">Entorno</td><td><span class="adm-badge {{ app()->isProduction() ? 'adm-badge-green' : 'adm-badge-gray' }}">{{ app()->environment() }}</span></td></tr>
            <tr><td style="color:#9a9a9a">Laravel</td><td>{{ app()->version() }}</td></tr>
            <tr><td style="color:#9a9a9a">PHP</td><td>{{ PHP_VERSION }}</td></tr>
            <tr><td style="color:#9a9a9a">Usuario activo</td><td>{{ auth()->user()->name }} ({{ auth()->user()->email }})</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
