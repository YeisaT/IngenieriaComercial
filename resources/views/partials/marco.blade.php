<section id="mision" class="ic-section bg-light">
  <div class="container">
    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="ic-card-white h-100">
          <span class="ic-eyebrow">Marco Institucional</span>
          <h2 class="ic-section-title">Misión</h2>
          <p>Formar ingenieros comerciales emprendedores, con conciencia crítica y reflexiva, en una perspectiva estratégica para las organizaciones; comprometidos con la investigación; mejorando las condiciones de vida de la población, en el marco del TIC y el desarrollo sostenible.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="ic-card-green h-100" id="vision">
          <span class="ic-eyebrow-light">Visión</span>
          <h2 class="text-white mb-3">Visión</h2>
          <p class="text-white-75">Ser la carrera de Ingeniería Comercial reconocida a nivel nacional e internacional con un equipo de docentes altamente calificado para la formación de profesionales integrales que contribuyan al mejoramiento de la competitividad de las organizaciones.</p>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <h3 class="ic-subtitle mb-3">Valores Institucionales</h3>
      <div class="d-flex flex-wrap gap-2">
        @foreach($valores as $v)
          <div class="ic-valor-chip">
            <i class="fa-solid {{ $v->icono }}"></i>
            <span>{{ $v->label }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
