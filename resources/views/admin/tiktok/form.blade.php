@extends('admin.layout')
@section('title', $reel->exists ? 'Editar reel' : 'Nuevo reel')
@section('breadcrumb', $reel->exists ? 'Modificar reel de TikTok' : 'Agregar nuevo reel')

@section('content')
<form method="POST"
      action="{{ $reel->exists ? route('admin.tiktok.update', $reel) : route('admin.tiktok.store') }}"
      enctype="multipart/form-data">
  @csrf
  @if($reel->exists) @method('PUT') @endif

  <div class="row g-4">

    {{-- Columna principal --}}
    <div class="col-lg-8">
      <div class="adm-card mb-4">
        <div class="adm-card-header"><span class="adm-card-title">Información del reel</span></div>
        <div class="adm-card-body">
          <div class="mb-3">
            <label class="adm-form-label">Link de TikTok <span style="color:#dc2626">*</span></label>
            <input type="url" name="link" class="adm-form-control"
                   value="{{ old('link', $reel->link) }}"
                   placeholder="https://www.tiktok.com/@usuario/video/..." required>
            <span class="adm-form-hint">URL completa del video en TikTok.</span>
          </div>
          <div class="mb-3">
            <label class="adm-form-label">Título (opcional)</label>
            <input type="text" name="titulo" class="adm-form-control" maxlength="120"
                   value="{{ old('titulo', $reel->titulo) }}"
                   placeholder="Texto que aparece sobre la imagen...">
          </div>
          <div class="row g-3">
            <div class="col-sm-6">
              <label class="adm-form-label">Vistas (opcional)</label>
              <input type="text" name="vistas" class="adm-form-control" maxlength="20"
                     value="{{ old('vistas', $reel->vistas) }}" placeholder="4347 o 12K">
              <span class="adm-form-hint">Número aproximado de vistas para mostrar.</span>
            </div>
            <div class="col-sm-6">
              <label class="adm-form-label">Orden</label>
              <input type="number" name="orden" class="adm-form-control" min="0"
                     value="{{ old('orden', $reel->orden ?? 0) }}">
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Columna lateral --}}
    <div class="col-lg-4">
      <div class="adm-card mb-4">
        <div class="adm-card-header"><span class="adm-card-title">Imagen de portada</span></div>
        <div class="adm-card-body">
          @if($reel->exists && $reel->imagen_url)
            <img src="{{ Str::startsWith($reel->imagen_url, '/') ? $reel->imagen_url : asset($reel->imagen_url) }}"
                 alt="Portada actual"
                 style="width:100%;height:200px;object-fit:cover;border-radius:8px;margin-bottom:1rem">
          @endif

          <label class="adm-upload-zone d-block" for="imagen">
            <i class="fa-brands fa-tiktok" style="font-size:2rem;color:#9a9a9a;display:block;margin-bottom:.75rem"></i>
            <p>Haz clic para seleccionar<br><small>JPG, PNG, WEBP · Relación 9:16 recomendada</small></p>
            <input type="file" id="imagen" name="imagen" accept="image/*" style="display:none"
                   onchange="previewImg(this)">
          </label>
          <img id="imgPreview" src="" alt=""
               style="display:none;width:100%;height:200px;object-fit:cover;border-radius:8px;margin-top:.75rem">

          <div class="mt-3">
            <label class="adm-form-label">O pegar URL de imagen</label>
            <input type="text" name="imagen_url" class="adm-form-control"
                   value="{{ old('imagen_url') }}" placeholder="https://...">
          </div>
        </div>
      </div>

      <div class="adm-card">
        <div class="adm-card-header"><span class="adm-card-title">Visibilidad</span></div>
        <div class="adm-card-body">
          <label style="display:flex;align-items:center;gap:.6rem;cursor:pointer">
            <input type="checkbox" name="activo" value="1"
                   style="accent-color:#2D9F3C;width:16px;height:16px"
                   {{ old('activo', $reel->activo ?? true) ? 'checked' : '' }}>
            <span class="adm-form-label mb-0">Reel activo (visible en el sitio)</span>
          </label>
        </div>
      </div>
    </div>

  </div>

  <div class="d-flex gap-3 mt-2">
    <button type="submit" class="adm-btn-primary">
      <i class="fa-solid fa-floppy-disk"></i>
      {{ $reel->exists ? 'Guardar cambios' : 'Crear reel' }}
    </button>
    <a href="{{ route('admin.tiktok.index') }}" class="adm-btn-outline">Cancelar</a>
  </div>
</form>
@endsection

@push('scripts')
<script>
function previewImg(input) {
  var p = document.getElementById('imgPreview');
  if (input.files && input.files[0]) {
    var r = new FileReader();
    r.onload = function(e){ p.src = e.target.result; p.style.display = 'block'; };
    r.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
