<section id="infraestructura" class="ic-section" style="background:var(--ic-surface-1)">
  <div class="container">

    <div class="row mb-5">
      <div class="col-lg-8">
        <span class="ic-eyebrow">Infraestructura</span>
        <h2 class="ic-section-title">Módulo 264</h2>
        <p>El módulo de la carrera constituye un espacio académico moderno y funcional, diseñado para promover el aprendizaje integral, la comodidad y el desarrollo profesional de los estudiantes. Cuenta con 24 aulas equipadas, 2 salas de cómputo, sala de lectura, dirección de carrera, sala SEPEG, auditorio y espacios de bienestar estudiantil.</p>
      </div>
    </div>

    {{-- Cards de espacios --}}
    <div class="row g-4 mb-5">
      @foreach([
        ['sepeg',     'fa-tv',              'Sala SEPEG',          '1er Piso',    'Tecnología para el Examen de Grado'],
        ['aulas',     'fa-chalkboard-user', 'Aulas y Tecnología',  'Todos los pisos', '24 aulas · cap. 50–80 alumnos'],
        ['computo',   'fa-desktop',         'Salas de Cómputo',    '3er Piso',    'Sala 1 (28 p.) · Sala 2 (50 p.)'],
        ['lectura',   'fa-book-open',       'Sala de Lectura',     '2do Piso',    'Zona de silencio y estudio'],
        ['auditorio', 'fa-microphone-lines','Auditorio',           '4to Piso',    'Conferencias y eventos académicos'],
        ['direccion', 'fa-door-open',       'Dirección y Secretaría','Planta Baja','Gestión y atención al estudiante'],
      ] as [$slug, $icon, $titulo, $piso, $desc])
        <div class="col-sm-6 col-lg-4">
          <a href="{{ route('infraestructura.show', $slug) }}" class="ic-infra-card ic-infra-link h-100">
            <div class="ic-infra-icon"><i class="fa-solid {{ $icon }}"></i></div>
            <h5 class="mt-3 mb-1">{{ $titulo }}</h5>
            <p class="small mb-2" style="color:var(--ic-green-700);font-weight:600">
              <i class="fa-solid fa-location-dot me-1"></i>{{ $piso }}
            </p>
            <p class="small mb-0">{{ $desc }}</p>
            <span class="ic-infra-link-cta mt-3">
              Ver detalles <i class="fa-solid fa-arrow-right ms-1"></i>
            </span>
          </a>
        </div>
      @endforeach
    </div>

    {{-- Unidades administrativas --}}
    <h3 class="ic-subtitle mb-4">Unidades Administrativas</h3>
    <div class="row g-3">
      @foreach($unidades as $u)
        <div class="col-sm-6 col-lg-4">
          <div class="ic-unidad-item">
            <h6 class="mb-1">{{ $u->titulo }}</h6>
            <p class="small mb-0">{{ $u->cuerpo }}</p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
