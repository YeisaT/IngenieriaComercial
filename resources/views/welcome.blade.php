<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingeniería Comercial — FCEE · U.A.G.R.M.</title>
  <meta name="description" content="Carrera de Ingeniería Comercial, Facultad de Ciencias Económicas y Empresariales, UAGRM.">

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- Font Awesome (local) --}}
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
  {{-- Custom CSS --}}
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

  @include('partials.header')
  @include('partials.hero')
  @include('partials.slider')
  @include('partials.tiktok-reels')
  @include('partials.marco')
  @include('partials.perfil')
  @include('partials.malla')
  @include('partials.historia')
  @include('partials.infraestructura')
  @include('partials.silab')
  @include('partials.graduacion')
  @include('partials.campo-laboral')
  @include('partials.contacto')
  @include('partials.footer')

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  {{-- Slider --}}
  <script src="{{ asset('js/slider.js') }}"></script>
  {{-- App --}}
  <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
