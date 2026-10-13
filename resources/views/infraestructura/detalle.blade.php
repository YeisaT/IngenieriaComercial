@extends('layouts.base')

@section('title', $seccion->titulo)
@section('description', $seccion->subtitulo)

@section('content')

  {{-- ── HERO ── --}}
  <div class="ic-detail-hero" style="background-image: url('{{ asset($seccion->imagen_hero) }}')">
    <div class="ic-detail-hero-overlay"></div>
    <div class="container position-relative z-1 text-center">
      <div class="ic-detail-hero-icon">
        <i class="fa-solid {{ $seccion->icono }}"></i>
      </div>
      <p class="ic-eyebrow-light mb-2">Módulo 264 · {{ $seccion->piso }}</p>
      <h1 class="ic-detail-hero-title">{{ $seccion->titulo }}</h1>
      <p class="ic-detail-hero-sub">{{ $seccion->subtitulo }}</p>
      <span class="ic-detail-badge {{ $seccion->badge_class }}">{{ $seccion->badge }}</span>
    </div>
  </div>

  {{-- ── BREADCRUMB ── --}}
  <div class="bg-white border-bottom py-2">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 small">
          <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none" style="color:var(--ic-green-700)">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/#infraestructura') }}" class="text-decoration-none" style="color:var(--ic-green-700)">Infraestructura</a></li>
          <li class="breadcrumb-item active">{{ $seccion->titulo }}</li>
        </ol>
      </nav>
    </div>
  </div>

  {{-- ── CONTENIDO PRINCIPAL ── --}}
  <section class="py-5" style="background:var(--ic-surface-1)">
    <div class="container">
      <div class="row g-5 align-items-start">

        {{-- Columna de texto --}}
        <div class="col-lg-7">
          <span class="ic-eyebrow">{{ $seccion->piso }} — Módulo 264</span>
          <h2 class="ic-section-title">{{ $seccion->titulo }}</h2>
          <p class="lead mb-4">{!! $seccion->intro !!}</p>

          {{-- Stats (solo aulas) --}}
          @isset($seccion->stats)
            <div class="row g-3 mb-4">
              @foreach($seccion->stats as $stat)
                <div class="col-4">
                  <div class="ic-infra-stat">
                    <span class="ic-infra-stat-num">{{ $stat['num'] }}</span>
                    <span class="ic-infra-stat-label">{{ $stat['label'] }}</span>
                  </div>
                </div>
              @endforeach
            </div>
          @endisset

          {{-- Salas de cómputo --}}
          @isset($seccion->salas)
            <div class="row g-3 mb-4">
              @foreach($seccion->salas as $sala)
                <div class="col-md-6">
                  <div class="ic-room-card">
                    <div class="ic-room-card-header">
                      <i class="fa-solid fa-desktop me-2"></i>{{ $sala['nombre'] }}
                      <span class="ic-room-cap ms-auto">{{ $sala['capacidad'] }}</span>
                    </div>
                    <ul class="ic-bullet-list mt-2">
                      @foreach($sala['items'] as $item)
                        <li><i class="fa-solid fa-check"></i>{{ $item }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              @endforeach
            </div>
          @endisset

          {{-- Columnas de bullets --}}
          @isset($seccion->columnas)
            <div class="row g-4">
              @foreach($seccion->columnas as $col)
                <div class="col-md-6">
                  <h6 class="ic-infra-subheading">{{ $col['titulo'] }}</h6>
                  <ul class="ic-bullet-list">
                    @foreach($col['items'] as $item)
                      <li>
                        <i class="fa-solid {{ $item['icon'] }}"></i>{{ $item['text'] }}
                      </li>
                    @endforeach
                  </ul>
                </div>
              @endforeach
            </div>
          @endisset

          {{-- Nota --}}
          @if(!empty($seccion->nota))
            <div class="ic-infra-note mt-4">
              <i class="fa-solid {{ $seccion->nota_icon }}"></i>
              <span>{!! $seccion->nota !!}</span>
            </div>
          @endif
        </div>

        {{-- Columna de imagen --}}
        <div class="col-lg-5">

          {{-- Si hay director: foto completa con overlay del nombre --}}
          @isset($seccion->director)
            <div class="ic-director-photo-wrap">
              <img src="{{ asset($seccion->imagen_contenido) }}"
                   alt="{{ $seccion->director }}"
                   class="ic-director-photo"
                   loading="lazy">
              <div class="ic-director-overlay">
                <div class="ic-director-avatar">
                  <i class="fa-solid fa-user-tie"></i>
                </div>
                <div>
                  <span class="ic-director-cargo">{{ $seccion->director_cargo }}</span>
                  <span class="ic-director-nombre">{{ $seccion->director }}</span>
                </div>
              </div>
            </div>
          @else
            <div class="ic-detail-img-wrap">
              <img src="{{ asset($seccion->imagen_contenido) }}"
                   alt="{{ $seccion->titulo }}"
                   class="ic-detail-content-img"
                   loading="lazy">
            </div>
          @endisset

          {{-- Card de ubicación --}}
          <div class="ic-detail-location-card mt-4">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="ic-infra-block-icon flex-shrink-0">
                <i class="fa-solid {{ $seccion->icono }}"></i>
              </div>
              <div>
                <h6 class="mb-0 fw-700" style="font-family:var(--ic-font-head)">{{ $seccion->titulo }}</h6>
                <small class="text-muted">Módulo 264 · Ingeniería Comercial</small>
              </div>
            </div>
            <div class="d-flex align-items-center gap-2 mb-2">
              <i class="fa-solid fa-location-dot" style="color:var(--ic-green-700);width:16px"></i>
              <span class="small"><strong>{{ $seccion->piso }}</strong> — Módulo 264, Av. Busch, Ciudad Universitaria</span>
            </div>
            <div class="d-flex align-items-center gap-2">
              <i class="fa-solid fa-building" style="color:var(--ic-green-700);width:16px"></i>
              <span class="small">Facultad de Ciencias Económicas y Empresariales · U.A.G.R.M.</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ── OTRAS SECCIONES ── --}}
  <section class="py-5 bg-white">
    <div class="container">
      <h3 class="ic-subtitle mb-4">Otras instalaciones del Módulo 264</h3>
      <div class="row g-3">
        @foreach([
          ['sepeg',     'fa-tv',              'Sala SEPEG',            '1er Piso',      'img/Sala_Tecnologica_Sepeg.jpeg'],
          ['aulas',     'fa-chalkboard-user', 'Aulas y Tecnología',    'Todos los pisos','img/Aulas1.jpeg'],
          ['computo',   'fa-desktop',         'Salas de Cómputo',      '3er Piso',      'img/Sala_de_Computo.jpeg'],
          ['lectura',   'fa-book-open',       'Sala de Lectura',       '2do Piso',      'img/Sala_de_Lectura.jpeg'],
          ['auditorio', 'fa-microphone-lines','Auditorio',             '4to Piso',      'img/Salon_Auditorio.jpeg'],
          ['direccion', 'fa-door-open',       'Dirección y Secretaría','Planta Baja',   'img/Infraestructura_Modulo.jpg'],
        ] as [$s, $icon, $label, $piso, $img])
          @if($s !== $slug)
            <div class="col-sm-6 col-lg-4">
              <a href="{{ route('infraestructura.show', $s) }}" class="ic-other-card">
                <div class="ic-other-card-img-wrap">
                  <img src="{{ asset($img) }}" alt="{{ $label }}" loading="lazy">
                </div>
                <div class="ic-other-card-body">
                  <div class="ic-infra-icon flex-shrink-0" style="width:36px;height:36px;font-size:1rem">
                    <i class="fa-solid {{ $icon }}"></i>
                  </div>
                  <div>
                    <span class="ic-other-card-title">{{ $label }}</span>
                    <span class="ic-other-card-piso">{{ $piso }}</span>
                  </div>
                  <i class="fa-solid fa-chevron-right ms-auto ic-ql-arrow"></i>
                </div>
              </a>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>

  {{-- ── BOTÓN VOLVER ── --}}
  <section class="py-5 ic-section-dark text-center">
    <div class="container">
      <p class="text-white-75 mb-4">¿Quieres conocer más sobre la carrera?</p>
      <a href="{{ url('/') }}" class="btn ic-btn-primary px-5 py-3">
        <i class="fa-solid fa-arrow-left me-2"></i>Volver a la página principal
      </a>
    </div>
  </section>

@endsection
