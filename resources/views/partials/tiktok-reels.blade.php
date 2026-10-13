@if($tiktokReels->isNotEmpty())
<section class="ic-tiktok-section">
  <div class="container">

    <div class="ic-tiktok-header">
      <div class="ic-tiktok-title-wrap">
        <span class="ic-eyebrow">Redes Sociales</span>
        <h2 class="ic-section-title ic-tiktok-title">
          Síguenos en
          <span class="ic-tiktok-brand">
            <i class="fa-brands fa-tiktok"></i> TikTok
          </span>
        </h2>
        <p class="ic-tiktok-sub">Contenido educativo y más sobre Ingeniería Comercial</p>
      </div>
      <a href="https://www.tiktok.com/@ing.comercial_fcee" target="_blank" rel="noopener"
         class="ic-tiktok-follow-btn">
        <i class="fa-brands fa-tiktok"></i> Seguir
      </a>
    </div>

    <div class="ic-tiktok-track-wrap">
      <div class="ic-tiktok-track" id="tiktokTrack">
        @foreach($tiktokReels as $reel)
          <a href="{{ $reel->link }}" target="_blank" rel="noopener"
             class="ic-tiktok-card" aria-label="{{ $reel->titulo ?? 'Ver reel en TikTok' }}">

            <div class="ic-tiktok-cover">
              @php
                $imgSrc = (str_starts_with($reel->imagen_url, '/') || str_starts_with($reel->imagen_url, 'http'))
                    ? $reel->imagen_url
                    : asset($reel->imagen_url);
              @endphp
              <img src="{{ $imgSrc }}" alt="{{ $reel->titulo ?? 'TikTok reel' }}" loading="lazy">

              <div class="ic-tiktok-overlay">
                <i class="fa-brands fa-tiktok ic-tiktok-play-icon"></i>
              </div>

              @if($reel->titulo)
                <div class="ic-tiktok-caption">{{ $reel->titulo }}</div>
              @endif
            </div>

            @if($reel->vistas)
              {{-- vistas ocultas --}}
            @endif

          </a>
        @endforeach
      </div>
    </div>

  </div>
</section>
@endif
