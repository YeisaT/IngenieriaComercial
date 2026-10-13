<section id="historia" class="ic-section" style="background:var(--ic-surface-2)">
  <div class="container">
    <div class="row g-5 mb-5 align-items-center">
      <div class="col-lg-7">
        <span class="ic-eyebrow">Reseña Histórica</span>
        <h2 class="ic-section-title">Nuestra trayectoria</h2>
        <blockquote class="ic-quote">
          "Detrás de cada logro, hay sueños que se atrevieron a caminar. Hoy, celebramos esos sueños que nos trajeron hasta aquí."
        </blockquote>
      </div>
      <div class="col-lg-5">
        <img src="{{ asset('img/ResenaHistorica.jpg') }}"
             alt="Reseña Histórica — Ingeniería Comercial"
             class="img-fluid rounded-3 shadow" loading="lazy">
      </div>
    </div>

    <div class="ic-timeline">
      @foreach($timeline as $t)
        <div class="ic-tl-item row g-4">
          <div class="col-auto">
            <span class="ic-tl-year">{{ $t->anio }}</span>
          </div>
          <div class="col">
            <div class="ic-tl-body">
              <h4>{{ $t->titulo }}</h4>
              <p>{{ $t->cuerpo }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
