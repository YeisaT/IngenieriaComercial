<footer class="ic-footer">
  <div class="container">

    {{-- Contenido principal del footer --}}
    <div class="row g-4 py-5">
      <div class="col-lg-5">
        <div class="d-flex align-items-center gap-3 mb-3">
          <img src="{{ asset('img/Logo_Comercial.png') }}" alt="Logo" class="ic-footer-logo">
          <div>
            <span class="ic-brand-name text-white d-block">Ingeniería Comercial</span>
            <span class="ic-brand-faculty">FCEE · U.A.G.R.M.</span>
          </div>
        </div>
        <p class="text-white-50 small">Formando profesionales íntegros, competitivos y con visión estratégica desde 1992.</p>
        <div class="d-flex gap-2 mt-3">
          @foreach($redesInstitucional as $r)
            <a href="{{ $r->url }}" target="_blank" rel="noopener"
               class="ic-footer-social" aria-label="{{ $r->label }}">
              <i class="{{ $r->icono }}"></i>
            </a>
          @endforeach
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <strong class="text-white-50 text-uppercase small d-block mb-3" style="letter-spacing:1.5px">Navegación</strong>
        <ul class="list-unstyled d-flex flex-column gap-2">
          @foreach([['inicio','Inicio'],['mision','Misión'],['perfil','Perfil'],['malla','Malla'],['historia','Historia'],['acreditacion','Acreditación'],['graduacion','Graduación'],['contacto','Contacto']] as [$id,$label])
            <li><a href="#{{ $id }}" class="ic-footer-link">{{ $label }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="col-sm-6 col-lg-4">
        <strong class="text-white-50 text-uppercase small d-block mb-3" style="letter-spacing:1.5px">Contacto</strong>
        <p class="text-white-50 small d-flex align-items-center gap-2 mb-2">
          <i class="fa-solid fa-location-dot" style="color:var(--ic-green-500)"></i>Av. Busch, Ciudad Universitaria, Módulo 264
        </p>
        <p class="text-white-50 small d-flex align-items-center gap-2 mb-2">
          <i class="fa-solid fa-phone" style="color:var(--ic-green-500)"></i>(591) 3 - 3577850
        </p>
        <p class="text-white-50 small d-flex align-items-center gap-2">
          <i class="fa-solid fa-envelope" style="color:var(--ic-green-500)"></i>ingenieriacouagrm@gmail.com
        </p>
      </div>
    </div>

    {{-- ── Créditos desarrolladora (dentro del footer oscuro) ── --}}
    <div class="ic-dev-row">
      <div class="ic-dev-left">
        @if(file_exists(public_path('img/developer/profile.jpg')))
          <img src="/img/developer/profile.jpg?v={{ filemtime(public_path('img/developer/profile.jpg')) }}"
               alt="Yeisa Isabel Torrico Romero"
               class="ic-dev-avatar ic-dev-avatar--clickable"
               data-bs-toggle="modal" data-bs-target="#modalDeveloper"
               title="Ver perfil de la desarrolladora">
        @else
          <div class="ic-dev-avatar ic-dev-avatar--placeholder ic-dev-avatar--clickable"
               data-bs-toggle="modal" data-bs-target="#modalDeveloper"
               title="Ver perfil de la desarrolladora">YT</div>
        @endif
        <div class="ic-dev-info">
          <span class="ic-dev-name">Yeisa Isabel Torrico Romero</span>
          <span class="ic-dev-role">Desarrolladora web · FCEE – UAGRM</span>
        </div>
      </div>
      <div class="ic-dev-actions">
        <a href="mailto:yeisatorricor@gmail.com" class="ic-dev-btn">
          <i class="fa-solid fa-envelope"></i><span>Correo</span>
        </a>
        <a href="https://www.linkedin.com/in/yeisatorrico" target="_blank" rel="noopener" class="ic-dev-btn">
          <i class="fa-brands fa-linkedin"></i><span>LinkedIn</span>
        </a>
      </div>
    </div>

    {{-- ── Copyright + botón admin ── --}}
    <div class="ic-footer-bottom">
      <p class="ic-footer-copy">
        © 2025 Ingeniería Comercial – FCEE · UAGRM. Todos los derechos reservados.
      </p>
      <button data-bs-toggle="modal" data-bs-target="#modalAdminLogin"
              class="ic-footer-admin-btn"
              onmouseover="this.style.color='rgba(255,255,255,.45)'"
              onmouseout="this.style.color='rgba(255,255,255,.15)'">
        Administración
      </button>
    </div>

  </div>
</footer>

{{-- ── MODAL DESARROLLADORA ── --}}
<div class="modal fade" id="modalDeveloper" tabindex="-1" aria-labelledby="modalDeveloperLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ic-dev-modal-dialog">
    <div class="modal-content ic-dev-modal-content">

      {{-- Lado izquierdo: foto --}}
      <div class="ic-dev-modal-img">
        @if(file_exists(public_path('img/developer/profile.jpg')))
          <img src="/img/developer/profile.jpg?v={{ filemtime(public_path('img/developer/profile.jpg')) }}"
               alt="Yeisa Isabel Torrico Romero">
        @else
          <div class="ic-dev-modal-img-placeholder">YT</div>
        @endif
      </div>

      {{-- Lado derecho: info --}}
      <div class="ic-dev-modal-info">
        <button type="button" class="ic-dev-modal-close" data-bs-dismiss="modal" aria-label="Cerrar">
          <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="ic-dev-modal-text">
          <h5 class="ic-dev-modal-name" id="modalDeveloperLabel">Yeisa Isabel Torrico Romero</h5>
          <span class="ic-dev-modal-role">Desarrolladora web · FCEE – UAGRM</span>
          <p class="ic-dev-modal-desc">
            Egresada de Ingeniería de Sistemas de la UTEPSA y actualmente cursando Ingeniería Comercial
            en la U.A.G.R.M., combina el pensamiento tecnológico con la visión empresarial.
            Co-fundadora de <strong>YAIS</strong>, comunidad boliviana dedicada a democratizar la
            inteligencia artificial. Enfocada en desarrollo web, IA y en construir espacios más
            inclusivos para mujeres en STEAM.
          </p>
        </div>

        <div class="ic-dev-modal-actions">
          <a href="https://www.linkedin.com/in/yeisatorrico" target="_blank" rel="noopener"
             class="ic-dev-modal-btn ic-dev-modal-btn--primary">
            <i class="fa-brands fa-linkedin"></i> Ver LinkedIn
          </a>
          <a href="mailto:yeisatorricor@gmail.com"
             class="ic-dev-modal-btn ic-dev-modal-btn--outline">
            <i class="fa-solid fa-envelope"></i> Enviar correo
          </a>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- ── MODAL LOGIN ADMIN ── --}}
<div class="modal fade" id="modalAdminLogin" tabindex="-1" aria-labelledby="modalAdminLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width:400px">
    <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;box-shadow:0 24px 64px rgba(0,0,0,.25)">
      <div style="background:linear-gradient(135deg,#0d2e14,#1a5c28);padding:1.75rem 2rem 1.5rem;text-align:center">
        <img src="{{ asset('img/Logo_Comercial.png') }}" alt="Logo"
             style="width:48px;height:48px;border-radius:10px;object-fit:contain;margin-bottom:.75rem">
        <h5 id="modalAdminLoginLabel"
            style="font-family:'Poppins',sans-serif;font-weight:700;color:#fff;margin:0 0 .2rem">
          Acceso Administrativo
        </h5>
        <p style="font-size:.72rem;color:rgba(255,255,255,.5);margin:0">FCEE · U.A.G.R.M.</p>
      </div>
      <div style="padding:1.75rem 2rem;background:#fff">
        @if(session('login_error'))
          <div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:.75rem 1rem;font-size:.78rem;color:#dc2626;margin-bottom:1rem;display:flex;align-items:center;gap:.5rem">
            <i class="fa-solid fa-circle-exclamation"></i> {{ session('login_error') }}
          </div>
        @endif
        <form method="POST" action="{{ route('admin.login.post') }}">
          @csrf
          <input type="hidden" name="from_modal" value="1">
          <div style="margin-bottom:1rem">
            <label style="font-size:.75rem;font-weight:600;color:#2e2e2e;display:block;margin-bottom:.4rem">Correo electrónico</label>
            <div style="position:relative">
              <i class="fa-solid fa-envelope" style="position:absolute;left:.85rem;top:50%;transform:translateY(-50%);color:#9a9a9a;font-size:.8rem"></i>
              <input type="email" name="email" required autocomplete="email" value="{{ old('email') }}"
                     placeholder="admin@ingco.edu.bo"
                     style="width:100%;border:1.5px solid #e8ebe8;border-radius:8px;padding:.6rem .9rem .6rem 2.4rem;font-size:.85rem;outline:none;font-family:'Inter',sans-serif;color:#1a1a1a"
                     onfocus="this.style.borderColor='#2D9F3C'" onblur="this.style.borderColor='#e8ebe8'">
            </div>
          </div>
          <div style="margin-bottom:1.25rem">
            <label style="font-size:.75rem;font-weight:600;color:#2e2e2e;display:block;margin-bottom:.4rem">Contraseña</label>
            <div style="position:relative">
              <i class="fa-solid fa-lock" style="position:absolute;left:.85rem;top:50%;transform:translateY(-50%);color:#9a9a9a;font-size:.8rem"></i>
              <input type="password" name="password" required autocomplete="current-password"
                     placeholder="••••••••"
                     style="width:100%;border:1.5px solid #e8ebe8;border-radius:8px;padding:.6rem .9rem .6rem 2.4rem;font-size:.85rem;outline:none;font-family:'Inter',sans-serif;color:#1a1a1a"
                     onfocus="this.style.borderColor='#2D9F3C'" onblur="this.style.borderColor='#e8ebe8'">
            </div>
          </div>
          <button type="submit"
                  style="width:100%;background:#2D9F3C;color:#fff;border:none;border-radius:8px;padding:.75rem;font-size:.88rem;font-weight:700;font-family:'Poppins',sans-serif;cursor:pointer;transition:background .2s"
                  onmouseover="this.style.background='#1a5c28'" onmouseout="this.style.background='#2D9F3C'">
            <i class="fa-solid fa-right-to-bracket me-2"></i>Ingresar al panel
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
