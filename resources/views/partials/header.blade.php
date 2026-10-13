<nav id="header" class="navbar navbar-expand-lg fixed-top ic-navbar">
  <div class="container">
    <a class="navbar-brand ic-brand" href="#inicio">
      <img src="{{ asset('img/Logo_Comercial.png') }}" alt="Logo" class="ic-logo-img">
      <div class="ic-brand-text">
        <span class="ic-brand-name">Ingeniería Comercial</span>
        <span class="ic-brand-faculty">FCEE · U.A.G.R.M.</span>
      </div>
    </a>

    <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse" data-bs-target="#navMenu"
            aria-controls="navMenu" aria-expanded="false" aria-label="Menú">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto gap-1 align-items-center">
        @foreach([
          ['inicio',          'Inicio'],
          ['mision',          'Misión'],
          ['perfil',          'Perfil'],
          ['malla',           'Malla'],
          ['historia',        'Historia'],
          ['acreditacion',    'Acreditación'],
          ['infraestructura', 'Infraestructura'],
          ['graduacion',      'Graduación'],
          ['contacto',        'Contacto'],
        ] as [$id, $label])
          <li class="nav-item">
            <a class="nav-link ic-nav-link" href="#{{ $id }}">{{ $label }}</a>
          </li>
        @endforeach

        {{-- Botón Admin — invisible hasta hover --}}
        <li class="nav-item ms-2">
          @auth
            <a href="{{ route('admin.dashboard') }}" class="ic-nav-admin-ghost">
              <i class="fa-solid fa-gauge"></i>
            </a>
          @else
            <button data-bs-toggle="modal" data-bs-target="#modalAdminLogin"
                    class="ic-nav-admin-ghost">
              <i class="fa-solid fa-lock"></i>
            </button>
          @endauth
        </li>
      </ul>
    </div>
  </div>
</nav>
