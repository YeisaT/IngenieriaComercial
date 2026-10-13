<section id="acreditacion" class="ic-section bg-white">
  <div class="container">
    <div class="row g-5 mb-5">
      <div class="col-lg-8">
        <span class="ic-eyebrow">Acreditación</span>
        <h2 class="ic-section-title">Proceso de Acreditación</h2>
        <p class="fw-semibold" style="color:var(--ic-green-700)">12, 13 y 14 de mayo de 2025 — Facultad de Ciencias Económicas y Empresariales · U.A.G.R.M.</p>
        <p>Del 12 al 14 de mayo de 2025, la carrera llevó a cabo un proceso de acreditación académica supervisado por un comité evaluador externo, conformado por especialistas en educación superior y representantes de organismos nacionales e internacionales.</p>
        <p>Este logro fue posible gracias al liderazgo comprometido de la Directora de Carrera, Ing. Rosmery Saavedra, y al trabajo coordinado del equipo académico, administrativo y estudiantil.</p>
      </div>
      <div class="col-lg-4">
        <div class="ic-score-card text-center">
          <img src="{{ asset('img/LogoSelloAcreditacion.jpg') }}"
               alt="Sello de Acreditación con Excelencia"
               class="img-fluid rounded-3 mb-3"
               style="max-height:120px;object-fit:contain"
               loading="lazy">
          <span class="ic-score-num">98.07<sup class="ic-score-sup">pts</sup></span>
          <p class="ic-score-label">Puntos obtenidos</p>
          <span class="ic-score-badge">Acreditada con Excelencia</span>
          <div class="mt-3">
            <div class="d-flex justify-content-between small mb-1" style="color:rgba(255,255,255,.5)">
              <span>Calificación obtenida</span><span>98.07 / 100</span>
            </div>
            <div class="progress" style="height:6px;background:rgba(255,255,255,.1)">
              <div class="progress-bar ic-progress-bar" style="width:98.07%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4 mb-4">
      @foreach($acreditacion as $item)
        <div class="col-sm-6 col-xl-3">
          <div class="ic-acred-card text-center h-100">
            <i class="fa-solid {{ $item->icono }} ic-acred-icon"></i>
            <h5 class="mt-3 mb-2">{{ $item->titulo }}</h5>
            <p class="small">{{ $item->cuerpo }}</p>
          </div>
        </div>
      @endforeach
    </div>

    <div class="ic-acred-note">
      <p>Uno de los aspectos más destacables fue el compromiso y la participación activa de los estudiantes. Desde la preparación previa hasta la recepción del comité evaluador, se evidenció un ambiente de unidad, respeto y colaboración.</p>
    </div>
  </div>
</section>
