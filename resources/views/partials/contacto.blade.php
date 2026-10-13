<section id="contacto" class="ic-section" style="background:var(--ic-surface-2)">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5">
        <span class="ic-eyebrow">Contacto</span>
        <h2 class="ic-section-title">Estamos para orientarte</h2>

        <div class="d-flex flex-column gap-3 mb-4">
          <div class="d-flex align-items-start gap-3">
            <div class="ic-contact-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div><strong class="ic-contact-label">Dirección</strong><p class="mb-0">Av. Busch, Ciudad Universitaria, Módulo 264</p></div>
          </div>
          <div class="d-flex align-items-start gap-3">
            <div class="ic-contact-icon"><i class="fa-solid fa-phone"></i></div>
            <div><strong class="ic-contact-label">Teléfono</strong><p class="mb-0">(591) 3 - 3577850</p></div>
          </div>
          <div class="d-flex align-items-start gap-3">
            <div class="ic-contact-icon"><i class="fa-solid fa-envelope"></i></div>
            <div><strong class="ic-contact-label">Correo</strong><p class="mb-0">ingenieriacouagrm@gmail.com</p></div>
          </div>
        </div>

        <strong class="ic-contact-label d-block mb-2">Redes Sociales</strong>
        <div class="d-flex flex-column gap-2">
          @foreach($redesInstitucional as $r)
            <a href="{{ $r->url }}" target="_blank" rel="noopener" class="ic-red-row">
              <i class="{{ $r->icono }}"></i><span>{{ $r->label }}</span>
            </a>
          @endforeach
        </div>
      </div>

      <div class="col-lg-7">
        <div class="ic-map-3d-wrap">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3797.0!2d-63.196945953198494!3d-17.77642512434251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zLTE3Ljc3NjQyNSwgLTYzLjE5Njk0Ng!5e0!3m2!1ses!2sbo!4v1620000000000!5m2!1ses!2sbo"
            width="100%" height="420" class="ic-map-iframe" allowfullscreen loading="lazy"
            title="Ubicación Ingeniería Comercial UAGRM">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>
