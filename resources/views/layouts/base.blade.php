<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') — Ingeniería Comercial FCEE</title>
  <meta name="description" content="@yield('description', 'Carrera de Ingeniería Comercial, FCEE · U.A.G.R.M.')">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  @stack('styles')
</head>
<body>

  {{-- Navbar mínima para páginas internas --}}
  <nav class="navbar fixed-top ic-navbar ic-navbar--scrolled">
    <div class="container">
      <a class="navbar-brand ic-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/Logo_Comercial.png') }}" alt="Logo" class="ic-logo-img">
        <div class="ic-brand-text">
          <span class="ic-brand-name">Ingeniería Comercial</span>
          <span class="ic-brand-faculty">FCEE · U.A.G.R.M.</span>
        </div>
      </a>
      <a href="{{ url('/') }}" class="btn ic-btn-back-nav">
        <i class="fa-solid fa-arrow-left me-2"></i>Inicio
      </a>
    </div>
  </nav>

  <main style="padding-top: var(--ic-header-h)">
    @yield('content')
  </main>

  {{-- Footer mínimo --}}
  <footer class="ic-footer py-4">
    <div class="container text-center">
      <p class="text-white-25 small mb-0">© 2025 Carrera de Ingeniería Comercial — Facultad de Ciencias Económicas y Empresariales, U.A.G.R.M.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
