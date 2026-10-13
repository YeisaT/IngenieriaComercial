@extends('layouts.base')

@section('title', $noticia->titulo)
@section('description', $noticia->descripcion)

@section('content')

  {{-- ── HERO ── --}}
  <div class="ic-detail-hero" style="background-image:url('{{ Str::startsWith($noticia->imagen_url, '/') ? $noticia->imagen_url : asset($noticia->imagen_url) }}')">
    <div class="ic-detail-hero-overlay"></div>
    <div class="container position-relative z-1 text-center">
      <span class="ic-detail-badge mb-3 d-inline-block">
        <i class="fa-solid fa-calendar me-1"></i>{{ $noticia->fecha }}
      </span>
      <h1 class="ic-detail-hero-title">{{ $noticia->titulo }}</h1>
    </div>
  </div>

  {{-- ── BREADCRUMB ── --}}
  <div class="bg-white border-bottom py-2">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 small">
          <li class="breadcrumb-item">
            <a href="{{ url('/') }}" class="text-decoration-none" style="color:var(--ic-green-700)">Inicio</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ url('/#noticias') }}" class="text-decoration-none" style="color:var(--ic-green-700)">Noticias</a>
          </li>
          <li class="breadcrumb-item active text-truncate" style="max-width:260px">{{ $noticia->titulo }}</li>
        </ol>
      </nav>
    </div>
  </div>

  {{-- ── CONTENIDO ── --}}
  <section class="py-5" style="background:var(--ic-surface-1)">
    <div class="container">
      <div class="row g-5 justify-content-center">

        {{-- Artículo principal --}}
        <div class="col-lg-8">
          <article class="ic-noticia-article">

            {{-- Meta --}}
            <div class="d-flex align-items-center gap-3 mb-4 flex-wrap">
              <span class="ic-noticia-fecha">
                <i class="fa-solid fa-calendar-days me-1"></i>{{ $noticia->fecha }}
              </span>
              <span class="ic-noticia-badge">Ingeniería Comercial</span>
            </div>

            {{-- Imagen principal --}}
            <img src="{{ Str::startsWith($noticia->imagen_url, '/') ? $noticia->imagen_url : asset($noticia->imagen_url) }}"
                 alt="{{ $noticia->titulo }}"
                 class="img-fluid rounded-3 shadow mb-4 w-100"
                 style="max-height:480px;object-fit:cover"
                 loading="eager">

            {{-- Título --}}
            <h1 class="ic-noticia-titulo">{{ $noticia->titulo }}</h1>

            {{-- Descripción destacada --}}
            <p class="ic-noticia-lead">{{ $noticia->descripcion }}</p>

            {{-- Cuerpo completo --}}
            @if($noticia->cuerpo)
              <div class="ic-noticia-cuerpo">
                {!! nl2br(e($noticia->cuerpo)) !!}
              </div>
            @endif

            {{-- Botón volver --}}
            <div class="mt-5 pt-3 border-top">
              <a href="{{ url('/') }}#noticias" class="ic-btn-volver">
                <i class="fa-solid fa-arrow-left me-2"></i>Volver a Noticias
              </a>
            </div>

          </article>
        </div>

        {{-- Sidebar de noticias relacionadas --}}
        <div class="col-lg-4">
          <div class="ic-noticia-sidebar">
            <h6 class="ic-noticia-sidebar-title">Otras noticias</h6>
            <div class="d-flex flex-column gap-3">
              @forelse($relacionadas as $r)
                <a href="{{ route('noticias.show', $r->slug) }}" class="ic-noticia-card-mini">
                  <img src="{{ $r->imagen_url }}" alt="{{ $r->titulo }}"
                       class="ic-noticia-card-mini-img" loading="lazy">
                  <div class="ic-noticia-card-mini-body">
                    <span class="ic-noticia-card-mini-fecha">{{ $r->fecha }}</span>
                    <p class="ic-noticia-card-mini-titulo">{{ $r->titulo }}</p>
                  </div>
                </a>
              @empty
                <p class="small text-muted">No hay otras noticias disponibles.</p>
              @endforelse
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ── VOLVER ── --}}
  <section class="py-4 ic-section-dark text-center">
    <div class="container">
      <a href="{{ url('/') }}" class="btn ic-btn-primary px-5">
        <i class="fa-solid fa-house me-2"></i>Volver a la página principal
      </a>
    </div>
  </section>

@endsection
