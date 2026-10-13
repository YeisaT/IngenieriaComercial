<section id="campo-laboral" class="ic-section ic-section-campo">
  <div class="container">
    <div class="text-center mb-5">
      <span class="ic-eyebrow">Egresados</span>
      <h2 class="ic-section-title">Campo Laboral</h2>
      <p class="mx-auto" style="max-width:580px">El Ingeniero Comercial está preparado para desempeñarse en diversas áreas del mundo empresarial y organizacional.</p>
    </div>

    <div class="row g-4">
      @foreach($campoLaboral as $item)
        <div class="col-sm-6 col-lg-4">
          <div class="ic-campo-card h-100">
            <div class="ic-campo-icon"><i class="fa-solid {{ $item->icono }}" style="font-size:1.6rem;color:#2D9F3C;display:block;line-height:1"></i></div>
            <h5 class="ic-campo-title">{{ $item->titulo }}</h5>
            <p class="small">{{ $item->descripcion }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
