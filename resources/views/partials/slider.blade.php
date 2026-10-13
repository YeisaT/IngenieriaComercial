<section class="ic-section-slider py-5">
  <div class="container">
    <div class="row g-4 align-items-stretch">

      {{-- SIDEBAR --}}
      <div class="col-lg-4">
        <div class="ic-quick-links h-100">
          @foreach([
            ['fa-file-pdf',        asset('img/MallaCurricular.jpg'),                  '_blank', 'Malla Curricular',        'Plan de estudios vigente'],
            ['fa-tv',              route('infraestructura.show','sepeg'),              '_self',  'Sala SEPEG',              '1er piso · Examen de Grado'],
            ['fa-chalkboard-user', route('infraestructura.show','aulas'),              '_self',  'Aulas y Tecnología',      '24 aulas · cap. 50–80 alumnos'],
            ['fa-desktop',         route('infraestructura.show','computo'),            '_self',  'Salas de Cómputo',        '3er piso · 28 y 50 personas'],
            ['fa-book-open',       route('infraestructura.show','lectura'),            '_self',  'Sala de Lectura',         '2do piso · Zona de silencio'],
            ['fa-microphone-lines',route('infraestructura.show','auditorio'),          '_self',  'Auditorio',               '4to piso · Conferencias'],
            ['fa-door-open',       route('infraestructura.show','direccion'),          '_self',  'Dirección y Secretaría',  'Planta baja · Atención al estudiante'],
            ['fa-graduation-cap',  '#graduacion',                                      '_self',  'Guía de Graduación',      'Modalidades de titulación'],
          ] as [$icon, $href, $target, $label, $desc])
            <a href="{{ $href }}" target="{{ $target }}" rel="noopener" class="ic-ql-btn">
              <span class="ic-ql-icon"><i class="fa-solid {{ $icon }}"></i></span>
              <span class="ic-ql-text">
                <span class="ic-ql-label">{{ $label }}</span>
                <span class="ic-ql-desc">{{ $desc }}</span>
              </span>
              <i class="fa-solid fa-chevron-right ic-ql-arrow"></i>
            </a>
          @endforeach
        </div>
      </div>

      {{-- CARRUSEL --}}
      <div class="col-lg-8 d-flex flex-column">
        <div id="noticiaCarousel" class="carousel slide ic-carousel h-100" data-bs-ride="carousel">
          <div class="carousel-inner h-100">
            @foreach($noticias as $i => $n)
              <div class="carousel-item h-100 {{ $i === 0 ? 'active' : '' }}">
                <img src="{{ Str::startsWith($n->imagen_url, '/') ? $n->imagen_url : asset($n->imagen_url) }}"
                     class="d-block w-100 ic-carousel-img"
                     alt="{{ $n->titulo }}" loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
                <div class="ic-carousel-overlay">
                  <div class="ic-carousel-content">
                    <span class="ic-slide-fecha">{{ $n->fecha }}</span>
                    <h3 class="ic-slide-titulo">{{ $n->titulo }}</h3>
                    <p class="ic-slide-desc d-none d-md-block">{{ $n->descripcion }}</p>
                    <a href="{{ route('noticias.show', $n->slug) }}" class="ic-slide-cta">
                      Leer más <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <button class="carousel-control-prev ic-carousel-btn" type="button"
                  data-bs-target="#noticiaCarousel" data-bs-slide="prev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <button class="carousel-control-next ic-carousel-btn" type="button"
                  data-bs-target="#noticiaCarousel" data-bs-slide="next">
            <i class="fa-solid fa-chevron-right"></i>
          </button>

          <div class="carousel-indicators ic-indicators">
            @foreach($noticias as $i => $_)
              <button type="button" data-bs-target="#noticiaCarousel"
                      data-bs-slide-to="{{ $i }}"
                      class="{{ $i === 0 ? 'active' : '' }}"
                      aria-label="Noticia {{ $i + 1 }}"></button>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
