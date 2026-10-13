<section id="graduacion" class="ic-section ic-section-dark">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-7">
        <span class="ic-eyebrow-light">Modalidades de Graduación</span>
        <h2 class="text-white">Sistema de titulación por niveles</h2>
        <p class="text-white-75">Reconocimiento académico progresivo en función del avance en la formación profesional.</p>
      </div>
    </div>

    <div class="row g-4">
      @foreach($niveles as $n)
        <div class="col-lg-4">
          <div class="ic-grad-card h-100">
            <i class="fa-solid {{ $n->icono }} ic-grad-icon"></i>
            <h5 class="text-white mt-3 mb-1">{{ $n->titulo }}</h5>
            <p class="ic-grad-req">{{ $n->requisito }}</p>
            <ul class="ic-grad-mods mt-3">
              @foreach($n->modalidades as $m)
                <li><i class="fa-solid fa-circle-dot me-2"></i>{{ $m }}</li>
              @endforeach
            </ul>
            @if($n->titulo_otorgado)
              <div class="ic-grad-titulo mt-3 pt-3">
                <p class="mb-0">{{ $n->titulo_otorgado }}</p>
              </div>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
