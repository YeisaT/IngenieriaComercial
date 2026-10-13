<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Panel') — Admin FCEE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --g9: #0d2e14; --g8: #1a5c28; --g7: #2D9F3C; --g4: #7dd98a; --g1: #d4f0d8; --g0: #edf8ef;
      --sidebar-w: 240px;
      --font-head: 'Poppins', sans-serif;
      --font-body: 'Inter', sans-serif;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: var(--font-body); background: #f4f6f4; color: #1a1a1a; display: flex; min-height: 100vh; }

    /* ── SIDEBAR ── */
    .adm-sidebar {
      width: var(--sidebar-w); min-height: 100vh;
      background: var(--g9);
      display: flex; flex-direction: column;
      position: fixed; top: 0; left: 0; bottom: 0;
      z-index: 100;
    }
    .adm-sidebar-brand {
      padding: 1.5rem 1.25rem 1rem;
      border-bottom: 1px solid rgba(255,255,255,.08);
    }
    .adm-sidebar-brand img { width: 36px; height: 36px; border-radius: 8px; object-fit: contain; }
    .adm-sidebar-brand-name { font-family: var(--font-head); font-size: .82rem; font-weight: 700; color: #fff; line-height: 1.2; }
    .adm-sidebar-brand-sub  { font-size: .65rem; color: rgba(255,255,255,.4); }

    .adm-nav { flex: 1; padding: 1rem 0; }
    .adm-nav-label {
      font-size: .62rem; font-weight: 700; letter-spacing: 1.5px;
      text-transform: uppercase; color: rgba(255,255,255,.3);
      padding: .75rem 1.25rem .35rem;
    }
    .adm-nav-link {
      display: flex; align-items: center; gap: .75rem;
      padding: .65rem 1.25rem;
      font-size: .82rem; font-weight: 500;
      color: rgba(255,255,255,.6);
      text-decoration: none;
      border-left: 3px solid transparent;
      transition: all .2s ease;
    }
    .adm-nav-link i { width: 16px; text-align: center; font-size: .85rem; }
    .adm-nav-link:hover { color: #fff; background: rgba(255,255,255,.06); }
    .adm-nav-link.active { color: #fff; background: rgba(45,159,60,.2); border-left-color: var(--g7); }

    .adm-sidebar-footer {
      padding: 1rem 1.25rem;
      border-top: 1px solid rgba(255,255,255,.08);
    }
    .adm-user-info { display: flex; align-items: center; gap: .75rem; margin-bottom: .75rem; }
    .adm-user-avatar {
      width: 32px; height: 32px; border-radius: 50%;
      background: var(--g7); display: flex; align-items: center; justify-content: center;
      font-size: .8rem; color: #fff; font-weight: 700; flex-shrink: 0;
    }
    .adm-user-name  { font-size: .78rem; font-weight: 600; color: #fff; line-height: 1.2; }
    .adm-user-role  { font-size: .65rem; color: rgba(255,255,255,.4); }

    /* ── MAIN ── */
    .adm-main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

    .adm-topbar {
      background: #fff; border-bottom: 1px solid #e8ebe8;
      padding: .85rem 2rem;
      display: flex; align-items: center; justify-content: space-between;
      position: sticky; top: 0; z-index: 50;
    }
    .adm-topbar-title { font-family: var(--font-head); font-size: 1rem; font-weight: 700; color: #1a1a1a; }
    .adm-topbar-breadcrumb { font-size: .75rem; color: #9a9a9a; margin-top: .1rem; }

    .adm-content { padding: 2rem; flex: 1; }

    /* ── CARDS ── */
    .adm-card { background: #fff; border-radius: 12px; box-shadow: 0 1px 8px rgba(0,0,0,.06); border: 1px solid #e8ebe8; }
    .adm-card-header { padding: 1.25rem 1.5rem; border-bottom: 1px solid #f0f2f0; display: flex; align-items: center; justify-content: space-between; }
    .adm-card-title  { font-family: var(--font-head); font-size: .92rem; font-weight: 700; margin: 0; }
    .adm-card-body   { padding: 1.5rem; }

    /* ── STAT CARDS ── */
    .adm-stat { background: #fff; border-radius: 12px; padding: 1.5rem; border: 1px solid #e8ebe8; box-shadow: 0 1px 8px rgba(0,0,0,.06); }
    .adm-stat-num   { font-family: var(--font-head); font-size: 2.2rem; font-weight: 800; color: var(--g7); line-height: 1; }
    .adm-stat-label { font-size: .75rem; color: #9a9a9a; text-transform: uppercase; letter-spacing: 1px; margin-top: .25rem; }
    .adm-stat-icon  { width: 44px; height: 44px; border-radius: 10px; background: var(--g0); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; color: var(--g7); }

    /* ── TABLE ── */
    .adm-table { width: 100%; border-collapse: collapse; }
    .adm-table th { font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #9a9a9a; padding: .75rem 1rem; border-bottom: 2px solid #f0f2f0; text-align: left; white-space: nowrap; }
    .adm-table td { padding: .85rem 1rem; border-bottom: 1px solid #f7f8f7; font-size: .85rem; vertical-align: middle; }
    .adm-table tr:last-child td { border-bottom: none; }
    .adm-table tr:hover td { background: #f7f8f7; }

    /* ── BADGES ── */
    .adm-badge { display: inline-flex; align-items: center; padding: .25rem .65rem; border-radius: 50px; font-size: .7rem; font-weight: 700; }
    .adm-badge-green  { background: var(--g0); color: var(--g8); }
    .adm-badge-gray   { background: #f0f2f0; color: #5a5a5a; }
    .adm-badge-red    { background: #fef2f2; color: #dc2626; }
    .adm-badge-blue   { background: #eff6ff; color: #1d4ed8; }

    /* ── BUTTONS ── */
    .adm-btn-primary { background: var(--g7); color: #fff; border: none; border-radius: 8px; padding: .55rem 1.25rem; font-size: .82rem; font-weight: 600; cursor: pointer; transition: background .2s; text-decoration: none; display: inline-flex; align-items: center; gap: .4rem; }
    .adm-btn-primary:hover { background: var(--g8); color: #fff; }
    .adm-btn-outline { background: transparent; color: var(--g7); border: 1.5px solid var(--g7); border-radius: 8px; padding: .5rem 1.1rem; font-size: .82rem; font-weight: 600; cursor: pointer; transition: all .2s; text-decoration: none; display: inline-flex; align-items: center; gap: .4rem; }
    .adm-btn-outline:hover { background: var(--g0); color: var(--g8); }
    .adm-btn-danger  { background: transparent; color: #dc2626; border: 1.5px solid #fca5a5; border-radius: 8px; padding: .5rem 1.1rem; font-size: .82rem; font-weight: 600; cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: .4rem; }
    .adm-btn-danger:hover { background: #fef2f2; }
    .adm-btn-sm { padding: .35rem .75rem; font-size: .75rem; }

    /* ── FORMS ── */
    .adm-form-label { font-size: .78rem; font-weight: 600; color: #2e2e2e; margin-bottom: .4rem; display: block; }
    .adm-form-control { width: 100%; border: 1.5px solid #e8ebe8; border-radius: 8px; padding: .6rem .9rem; font-size: .85rem; font-family: var(--font-body); color: #1a1a1a; background: #fff; transition: border-color .2s; outline: none; }
    .adm-form-control:focus { border-color: var(--g7); box-shadow: 0 0 0 3px rgba(45,159,60,.1); }
    .adm-form-hint { font-size: .72rem; color: #9a9a9a; margin-top: .3rem; }
    .adm-form-error { font-size: .72rem; color: #dc2626; margin-top: .3rem; }

    /* ── ALERTS ── */
    .adm-alert-success { background: var(--g0); border: 1px solid var(--g1); border-radius: 8px; padding: .85rem 1.25rem; font-size: .85rem; color: var(--g8); display: flex; align-items: center; gap: .6rem; }
    .adm-alert-error   { background: #fef2f2; border: 1px solid #fca5a5; border-radius: 8px; padding: .85rem 1.25rem; font-size: .85rem; color: #dc2626; display: flex; align-items: center; gap: .6rem; }

    /* ── UPLOAD ZONE ── */
    .adm-upload-zone { border: 2px dashed #e8ebe8; border-radius: 10px; padding: 2rem; text-align: center; cursor: pointer; transition: border-color .2s, background .2s; }
    .adm-upload-zone:hover { border-color: var(--g7); background: var(--g0); }
    .adm-upload-zone i { font-size: 2rem; color: #9a9a9a; margin-bottom: .75rem; display: block; }
    .adm-upload-zone p { font-size: .82rem; color: #9a9a9a; margin: 0; }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      .adm-sidebar { transform: translateX(-100%); }
      .adm-main    { margin-left: 0; }
    }
  </style>
</head>
<body>

  {{-- SIDEBAR --}}
  <aside class="adm-sidebar">
    <div class="adm-sidebar-brand d-flex align-items-center gap-2">
      <img src="{{ asset('img/Logo_Comercial.png') }}" alt="Logo">
      <div>
        <div class="adm-sidebar-brand-name">Panel Admin</div>
        <div class="adm-sidebar-brand-sub">FCEE · U.A.G.R.M.</div>
      </div>
    </div>

    <nav class="adm-nav">
      <div class="adm-nav-label">General</div>
      <a href="{{ route('admin.dashboard') }}"
         class="adm-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
      </a>

      <div class="adm-nav-label mt-2">Contenido</div>
      <a href="{{ route('admin.noticias.index') }}"
         class="adm-nav-link {{ request()->routeIs('admin.noticias.*') ? 'active' : '' }}">
        <i class="fa-solid fa-newspaper"></i> Noticias
      </a>
      <a href="{{ route('admin.redes.index') }}"
         class="adm-nav-link {{ request()->routeIs('admin.redes.*') ? 'active' : '' }}">
        <i class="fa-solid fa-share-nodes"></i> Redes Sociales
      </a>
      <a href="{{ route('admin.tiktok.index') }}"
         class="adm-nav-link {{ request()->routeIs('admin.tiktok.*') ? 'active' : '' }}">
        <i class="fa-brands fa-tiktok"></i> TikTok Reels
      </a>

      <div class="adm-nav-label mt-2">Sistema</div>
      <a href="{{ route('admin.usuarios.index') }}"
         class="adm-nav-link {{ request()->routeIs('admin.usuarios.*') ? 'active' : '' }}">
        <i class="fa-solid fa-users"></i> Usuarios
      </a>
      <a href="{{ url('/') }}" class="adm-nav-link" target="_blank">
        <i class="fa-solid fa-arrow-up-right-from-square"></i> Ver sitio
      </a>
      <div class="adm-nav-label mt-2">Desarrolladora</div>
      <a href="{{ route('admin.perfil') }}"
         class="adm-nav-link {{ request()->routeIs('admin.perfil') ? 'active' : '' }}">
        <i class="fa-solid fa-circle-user"></i> Foto de perfil
      </a>
    </nav>

    <div class="adm-sidebar-footer">
      <div class="adm-user-info">
        <div class="adm-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        <div>
          <div class="adm-user-name">{{ auth()->user()->name }}</div>
          <div class="adm-user-role">{{ ucfirst(auth()->user()->role) }}</div>
        </div>
      </div>
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="adm-btn-danger adm-btn-sm w-100 justify-content-center">
          <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
        </button>
      </form>
    </div>
  </aside>

  {{-- MAIN --}}
  <div class="adm-main">
    <header class="adm-topbar">
      <div>
        <div class="adm-topbar-title">@yield('title', 'Dashboard')</div>
        <div class="adm-topbar-breadcrumb">@yield('breadcrumb', 'Panel de administración')</div>
      </div>
      <div class="d-flex align-items-center gap-2">
        @yield('topbar-actions')
      </div>
    </header>

    <main class="adm-content">
      @if(session('success'))
        <div class="adm-alert-success mb-4">
          <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
      @endif
      @if($errors->any())
        <div class="adm-alert-error mb-4">
          <i class="fa-solid fa-circle-exclamation"></i>
          <ul class="mb-0 ps-3">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
          </ul>
        </div>
      @endif
      @yield('content')
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
