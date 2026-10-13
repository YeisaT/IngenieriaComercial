<section class="ic-silab-section">
  <div class="container">

    {{-- Encabezado de sección --}}
    <div class="ic-silab-heading">
      <span class="ic-eyebrow">Vinculación Académica y Empresarial</span>
      <h2 class="ic-section-title">Inserción Laboral y Empresa Junior</h2>
    </div>

    <div class="row g-4 align-items-stretch">

      {{-- SILAB --}}
      <div class="col-md-6">
        <div class="ic-silab-card">
          <div class="ic-silab-card-top">
            <div class="ic-silab-icon-wrap">
              <i class="fa-solid fa-briefcase"></i>
            </div>
            <div>
              <span class="ic-silab-eyebrow">Sistema de Inserción Laboral</span>
              <h3 class="ic-silab-title">SILAB</h3>
            </div>
          </div>
          <p class="ic-silab-desc">El Sistema de Inserción Laboral (SILAB) es una unidad fundamental de la carrera, diseñada para fortalecer la empleabilidad y el desarrollo profesional de estudiantes y egresados. Actúa como puente estratégico entre el ámbito académico y el mundo empresarial.</p>
          <div class="ic-silab-features">
            <div class="ic-silab-feature">
              <i class="fa-solid fa-circle-check"></i>
              <span>Bolsa de trabajo activa para egresados</span>
            </div>
            <div class="ic-silab-feature">
              <i class="fa-solid fa-circle-check"></i>
              <span>Vinculación con empresas del sector</span>
            </div>
            <div class="ic-silab-feature">
              <i class="fa-solid fa-circle-check"></i>
              <span>Orientación profesional y desarrollo de carrera</span>
            </div>
          </div>
        </div>
      </div>

      {{-- INMERCO --}}
      <div class="col-md-6">
        <div class="ic-inmerco-card">

          {{-- Header con logo --}}
          <div class="ic-inmerco-card-top">
            <img src="{{ asset('img/Inmerco_logo.png') }}"
                 alt="Logo INMERCO"
                 class="ic-inmerco-logo"
                 loading="lazy">
            <div>
              <span class="ic-inmerco-eyebrow">Primera Empresa Junior</span>
              <h3 class="ic-inmerco-title">INMERCO</h3>
              <span class="ic-inmerco-fecha">
                <i class="fa-solid fa-calendar-days me-1"></i>
                Fundada el 11 de abril de 2016
              </span>
            </div>
          </div>

          <div class="ic-inmerco-divider"></div>

          {{-- Descripción --}}
          <p class="ic-inmerco-desc">Somos una empresa que crea y facilita, de manera eficiente y discreta, información precisa, oportuna y confiable para el sector empresarial de Santa Cruz.</p>

          {{-- Resolución --}}
          <div class="ic-inmerco-resolucion">
            <i class="fa-solid fa-file-lines"></i>
            <span>Resolución Facultativa N° 018/2016</span>
          </div>

          {{-- Redes sociales --}}
          <div class="ic-inmerco-redes-wrap">
            <span class="ic-inmerco-redes-label">Redes sociales</span>
            <div class="ic-inmerco-redes-grid">
              @foreach($redesInmerco as $r)
                <a href="{{ $r->url }}" target="_blank" rel="noopener"
                   class="ic-inmerco-red" aria-label="{{ $r->label }}">
                  <i class="{{ $r->icono }}"></i>
                  <span>{{ $r->label }}</span>
                </a>
              @endforeach
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
