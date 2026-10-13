@extends('admin.layout')
@section('title', 'Foto de perfil')
@section('breadcrumb', 'Actualizar foto de la desarrolladora en el footer')

@section('content')
<div class="row g-4 justify-content-center">
  <div class="col-lg-6">
    <div class="adm-card">
      <div class="adm-card-header"><span class="adm-card-title">Foto de perfil — Créditos del footer</span></div>
      <div class="adm-card-body">

        {{-- Vista previa actual --}}
        <div class="text-center mb-4">
          @if($hasPhoto)
            <img src="/img/developer/profile.jpg?v={{ time() }}"
                 alt="Foto actual"
                 style="width:100px;height:100px;border-radius:50%;object-fit:cover;border:3px solid #2D9F3C;box-shadow:0 4px 16px rgba(45,159,60,.2)">
            <p class="adm-form-hint mt-2">Foto actual</p>
          @else
            <div style="width:100px;height:100px;border-radius:50%;background:#edf8ef;border:3px solid #2D9F3C;display:flex;align-items:center;justify-content:center;font-family:'Poppins',sans-serif;font-weight:800;font-size:1.4rem;color:#2D9F3C;margin:0 auto">
              YT
            </div>
            <p class="adm-form-hint mt-2">Sin foto — se muestra el placeholder "YT"</p>
          @endif
        </div>

        {{-- Formulario de subida --}}
        <form method="POST" action="{{ route('admin.perfil.update') }}" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label class="adm-form-label">Subir nueva foto <span style="color:#dc2626">*</span></label>
            <label class="adm-upload-zone d-block" for="foto">
              <i class="fa-solid fa-user-circle" style="font-size:2rem;color:#9a9a9a;display:block;margin-bottom:.75rem"></i>
              <p>Haz clic para seleccionar<br>
                <small>Solo JPG/JPEG · Máx. 4 MB · Se guardará como <strong>profile.jpg</strong></small>
              </p>
              <input type="file" id="foto" name="foto" accept=".jpg,.jpeg" style="display:none"
                     onchange="previewFoto(this)">
            </label>
            @error('foto')
              <span class="adm-form-error">{{ $message }}</span>
            @enderror
          </div>

          <img id="fotoPreview" src="" alt=""
               style="display:none;width:100px;height:100px;border-radius:50%;object-fit:cover;border:3px solid #2D9F3C;margin:0 auto .75rem;display:none">

          <div class="adm-form-hint mb-3">
            La foto reemplazará automáticamente la anterior. Aparecerá en el footer del sitio público.
          </div>

          <button type="submit" class="adm-btn-primary w-100 justify-content-center">
            <i class="fa-solid fa-cloud-arrow-up"></i> Guardar foto de perfil
          </button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
function previewFoto(input) {
  var preview = document.getElementById('fotoPreview');
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
